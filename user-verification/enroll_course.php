
 <?php 
//Start the session to see if the user is authenticated user. 
require 'base.php';
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 


//if ($_POST['submit'] == 'enroll') 
//{ 
	if($_SESSION['verified']==1) 
{ 

//Connect to mysql server 
// require 'config/db.php';
//Prepare query 
//$branch = (string)$_POST['branch'];
//$batch =(int) $_POST['batch']; 
//$announcement=(string)$_POST['announcement'];
$query = "INSERT INTO course_enrolled(student_email,course_id)
VALUES ('".$_SESSION["email"]."','".$_POST["courseid"]."')";
//Execute query 
//$result = mysqli_query($link,$query); 
if(mysqli_query($conn,$query)){
echo '<h2>Course Enrolled Successfully<br/><a href="enroll_course.php">CLick here to enroll into another course</a><br/><br/><br/><br/><br/></h2>';} 
else{
	echo 'Course Enroll failed';
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
