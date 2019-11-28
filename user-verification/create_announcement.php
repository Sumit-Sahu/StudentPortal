
<?php require 'base.php';
//Start the session to see if the user is authenticated user. 
//session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// require('menu.php'); 
//} 
//else{ 
//header('location:login_form.php'); 
//exit(); 
//} 
?> 
<html> 
<body> 
<center> 
<h1>Create Announcement</h1> 
<form action = "uploadAnnouncement.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Branch</td> 
<td><input type="text" name="branch" maxlength="10" required></td> 
</tr>
<tr> 
<td>Batch</td> 
<td><input type="integer" name="batch" maxlength="7" required></td> 
</tr>
<tr> 
<td>Announcement</td> 
<td><input type="text" name="announcement" maxlength="100" required></td> 
</tr> 
</table> 
<table cellpadding = "20"> 
<tr> 
<td><input type="submit" name="submit" value="Upload announcement" class="btn btn-primary"></td>  
</tr> 
</table> 
</form> 
</center> 
</body> 
</html>
<?php require 'footer.php' ?>
