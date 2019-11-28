
 
<?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
//if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//require('menu.php'); 
 
 /*Connect to mysql server*/ 
// require 'config/db.php';
$link = mysqli_connect('localhost', 'root', '');  


if(!$link)
{ 
die('Failed to connect to server: ' . mysqli_error());
 } 


$db = mysqli_select_db($link,'user-verification'); 
if(!$db)
{
 die("Unable to select database"); 
}

$qry = 'SELECT * FROM student'; 


$result = mysqli_query($link,$qry);
echo '<h1>The Students Profile are - </h1>';

 /*Draw the table for Players*/ 
echo '<table border="1"> 

<th> Email </th> 
<th> Roll no. </th>
 <th> Name </th> 
 <th> Batch </th>
 <th> Branch </th>
 <th> DOB </th>';

/*Show the rows in the fetched result set one by one*/ 
while ($row = mysqli_fetch_assoc($result))
{ 
echo '<tr> 

<td>'.$row['email'].'</td>
<td>'.$row['roll_no'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['batch'].'</td>
<td>'.$row['branch'].'</td>
<td>'.$row['dateOfBirth'].'</td> 
</tr>'; 
}

echo '</table>';

//else{ 
//header('location:login_form.php'); 
//exit(); 
//} 
?>
