
 <?php 
 require 'base.php';
//Start the session to see if the user is authenticated user. 
// session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 

// require 'config/db.php';

if ($_POST['submit'] == 'Upload announcement') 
{ 
if($_POST['branch']&& $_POST['batch']&&$_POST['announcement']) 
{ 
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
//$branch = (string)$_POST['branch'];
//$batch =(int) $_POST['batch']; 
//$announcement=(string)$_POST['announcement'];
$sql = "INSERT INTO announcement(related_branch,related_batch,description,faculty_id)
VALUES ('".$_POST["branch"]."','".$_POST["batch"]."','".$_POST["announcement"]."','{$_SESSION['email']}')";
// $stmt=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_query($conn,$sql)){
echo '<h2>Announcement Uploaded Successfully!  <br/><br/></h2></h1>
<br/><a href=create_announcement.php Click here to upload another announcement</a></h1><br/><br/><br/><br/><br/><br/>';} 
else{
	die(mysqli_error($conn));
	echo '  Announcement upload failed';
}
} 
//else{
//echo 'Announcement Upload Failed';}
else 
{ 
include("create_announcement.php"); 
echo "<center>Enter details</ center>"; 
} 
}  

require 'footer.php';

//else{ 
//header('location:login_form.php'); 
//exit(); 
//} 
?>
