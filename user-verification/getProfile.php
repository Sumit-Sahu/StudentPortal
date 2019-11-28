
 <?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 

require 'config/db.php';
// if ($_POST['submit'] == 'Show Profie') 
// { 
// if($_POST['student_email']) 
// { 
// require('menu.php'); 
//Connect to mysql server 
// $link = mysqli_connect('localhost', 'root', ''); 
// //Check link to the mysql server 
// if(!$link){ 
// die('Failed to connect to server: ' . mysqli_error()); 
// } 
// //Select database 
// $db = mysqli_select_db($link,'portal'); 
// if(!$db){ 
// die("Unable to select database"); 
// } 
//Prepare query 
// $email = $_POST['student_email']; 
// $query = "SELECT s.email,s.roll_no,s.name,s.batch,s.branch,s.dateOfBirth
// FROM student s
// WHERE s.Email = '$email'";
// //Execute query 
// $result = mysqli_query($conn,$query); 
// echo "<center><h1>Student Profile</h1>"; 
// echo "<table border='1' cellpadding = '10'> 
// <tr><th>Email</th> 
// <th>Roll no</th> 
// <th>Name</th>
// <th>Batch</th>
// <th>Branch</th>
// <th>DOB</th> 
// </tr>"; 

// while($row = mysqli_fetch_array($result)) 
 
// { 
// echo "<tr><td>" . $row['Email'] . "</td> 
// <td>" . $row['Roll_no']."</td>
// <td>" . $row['Name']."</td>
// <td>" . $row['Batch']."</td>
// <td>" . $row['Branch']."</td> 
// <td>" . $row['DateOfBirth'] . "</td> 
// </tr>"; 
// echo "<br/>"; 
// } 
// echo "</table></center>"; 
// } 
// else 
// { 
// include("student_profile.php"); 
// echo "<center>Enter the student email</ center>"; 
// }
// } 

 // Code to be executed when 'Account Balance' is clicked. 
// if ($_POST['submit'] == 'Courses Enrolled') 
// { 
// if($_POST['student_email']) 
// { 
require('menu.php'); 
//Connect to mysql server 
// $link = mysqli_connect('localhost', 'root', ''); 
// //Check link to the mysql server 
// if(!$link){ 
// die('Failed to connect to server: ' . mysqli_error()); 
// } 
// //Select database 
// $db = mysqli_select_db($link,'portal'); 
// if(!$db){ 
// die("Unable to select database"); 
// } 
//Prepare query 
 if($_SESSION['designation']=='student'){
    $query = "SELECT course_enrolled.course_id,course.name
    FROM course_enrolled ,course
    WHERE course_enrolled.course_id=course.course_id
    AND student_email =  '{$_SESSION['email']}' ";
    //Execute query 
    $result = mysqli_query($conn,$query); 
    echo "<center><h1>Course Enrolled</h1>"; 
    echo "<table border='1' cellpadding = '10'> 
    <tr><th>course Code</th> 
    <th>Course name</th> 
    </tr>"; 
    if(!$result){
        echo "You have not enrolled in any course";
    }
    else{
        while($row = mysqli_fetch_array($result)) 
     
    { 
        
    echo "<tr><td>" . $row['course_id'] . "</td> 
    <td>" . $row['name']."</td>  
    </tr>"; 
    echo "<br/>"; 
    } 
    
    echo "</table></center>"; 
    }

 }
else if($_SESSION['designation']=='faculty'){
    $query = "SELECT DISTINCT course_instructor.course_id,course.name
    FROM course_instructor ,course
    WHERE course_instructor.course_id=course.course_id
    AND course_instructor.faculty_id='{$_SESSION['email']}' ";
    
    //Execute query 
    $result = mysqli_query($conn,$query); 
    echo "<center><h1>Taken Enrolled</h1>"; 
    echo "<table border='1' cellpadding = '10'> 
    <tr><th>course Code</th> 
    <th>Course name</th> 
    </tr>"; 
    if(!$result){
        echo "You have not enrolled in any course";
    }
    else{
        while($row = mysqli_fetch_array($result)) 
     
    { 
        
    echo "<tr><td>" . $row['course_id'] . "</td> 
    <td>" . $row['name']."</td>  
    </tr>"; 
    echo "<br/>"; 
    } 
    
    echo "</table></center>"; 
    }    

}



// else 
// { 
// include("student_profile.php"); 
// echo "<center>Enter the email</ center>"; 
// } 
// }  

//else{ 
//header('location:login_form.php'); 
//exit(); 
//} 
?>
