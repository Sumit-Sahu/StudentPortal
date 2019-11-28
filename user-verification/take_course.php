
 <?php require 'base.php';
//Start the session to see if the user is authenticated user. 
//session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 


//if ($_POST['submit'] == 'enroll') 
//{ 
if($_SESSION['verified']==1) 
{ 


//$announcement=(string)$_POST['announcement'];
$query = " INSERT INTO course_instructor(faculty_id,course_id)
VALUES ('".$_SESSION["email"]."','".$_POST['courseid']."') ";
//echo '<p><strong>SQL Query</strong><br />'.$query.'</p>';
//Execute query 
//$result = mysqli_query($link,$query); 
if(mysqli_query($conn,$query)){
echo 'Course Taken Successfully';} 
else{
	echo 'Course taken failed! ,check if you have already taken this ourse' ;
}
} 
//else{
//echo 'Announcement Upload Failed';}
else 
{ 
include("enroll_course.html"); 
echo "<center>Enter details</ center>"; 
} 
//}  

//else{ 
//header('location:login_form.php'); 
//exit(); 
//} 
require 'footer.php';
?>
