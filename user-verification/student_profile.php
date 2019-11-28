
<?php 
//Start the session to see if the user is authenticated user. 
//session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//require('menu.php'); 
//} 
//else{ 
//header('location:login_form.php'); 
//exit(); 
//} 
?> 
<html> 
<body> 
<center> 
<h1>Student Profile</h1> 
<form action = "getProfile.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Customer Email</td> 
<td><input type="text" name="student_email" maxlength="30"></td> 
</tr> 
</table> 
<table cellpadding = "20"> 
<tr> 
<td><input type="submit" name="submit" value="Show Profie"></td> 
<td><input type="submit" name="submit" value="Courses Enrolled"></td> 
</tr> 
</table> 
</form> 
</center> 
</body> 
</html>