
 <?php 
//Start the session to see if the user is authenticated user. 
require 'base.php' ;
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}
if($_SESSION['designation']=='student'){
    $branch = $_SESSION['branch'];
    $batch = $_SESSION['batch']; 
    $query = "SELECT *
    FROM announcement
    WHERE (related_branch='$branch' OR '$branch'='all')
    AND related_batch='$batch'
    ORDER BY date_made DESC ";
    //Execute query 
    $result = mysqli_query($conn,$query); 

    
    
    // echo "<center><h1>Announcements</h1>"; 
    // echo "<table border='1' cellpadding = '10'> 
    // <tr><th>Branch</th> 
    // <th>Batch</th> 
    // <th>Announcement</th>
    // </tr>"; 
    
    while($row = mysqli_fetch_array($result)) 
     
    { 
        $sql="SELECT *
        FROM faculty
        WHERE email=  '{$row['faculty_id']}' ";
        $stmt= mysqli_query($conn,$sql); 
        $column=mysqli_fetch_array($stmt);
        echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['description']. " <br> Posted by :-  " . $column['post']. " " . $column['name']. " <br> Posted on :-  " . $row['date_made']. "  </a>"; 
     
    
   
    
   
    }
     
}
else if($_SESSION['designation']=='faculty'){
    $query = "SELECT *
    FROM announcement
    WHERE faculty_id='{$_SESSION['email']}' ";
    $result = mysqli_query($conn,$query);  
    
    while($row = mysqli_fetch_array($result)) 
     
    { 
        $sql="SELECT *
        FROM faculty
        WHERE email=  '{$row['faculty_id']}' ";
        $stmt= mysqli_query($conn,$sql); 
        $column=mysqli_fetch_array($stmt);
        echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['description']. " <br> Posted by :-  " . $column['post']. " " . $column['name']. " <br> Posted on :-  " . $row['date_made']. "  </a>"; 
     
    } 
    
}

require 'footer.php';

// if ($_POST['submit'] == 'Get announcement') 
// { 
// if($_POST['branch']&&$_POST['batch']) 
// { 
// require('menu.php'); 

// // $link = mysqli_connect('localhost', 'root', ''); 
// // if(!$link){ 
// // die('Failed to connect to server: ' . mysqli_error()); 
// // } 
// // //Select database 
// // $db = mysqli_select_db($link,'portal'); 
// // if(!$db){ 
// // die("Unable to select database"); 
// // } 
// $branch = $_POST['branch'];
// $batch = $_POST['batch']; 
// $query = "SELECT *
// FROM announcement
// WHERE (related_branch='$branch' OR '$branch'='all')
// AND related_batch='$batch'";
// //Execute query 
// $result = mysqli_query($conn,$query); 
// echo "<center><h1>Announcements</h1>"; 
// echo "<table border='1' cellpadding = '10'> 
// <tr><th>Branch</th> 
// <th>Batch</th> 
// <th>Announcement</th>
// </tr>"; 

// while($row = mysqli_fetch_array($result)) 
 
// { 
// echo "<tr><td>" . $row['related_branch'] . "</td> 
// <td>" . $row['related_batch']."</td>
// <td>" . $row['description']."</td>
// </tr>"; 
// echo "<br/>"; 
// } 
// echo "</table></center>"; 
// } 
// else 
// { 
// include("view_announcement.php"); 
// echo "<center>Enter details</ center>"; 
// } 
// }  

// //else{ 
// //header('location:login_form.php'); 
// //exit(); 
// //} 
?>
