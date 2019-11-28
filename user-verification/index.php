<?php 
require_once 'controllers/authController.php'; 
// if(isset($_SESSION['batch']))
// {
//  echo $_SESSION['batch'];
// }
// else
//    echo 'NO';

if(isset($_GET['token'])){
    $token=$_GET['token'];
    
    verifyUser($token);
    
}
if(isset($_GET['password-token'])){
  $passwordToken=$_GET['password-token'];
  
  resetPassword($passwordToken);
  
}

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}
if($_SESSION['designation']=='student'){


  ?>




<html>
<head>

<title>Homepage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="master.css">
</head>
<body>
  <?php include 'header.php'; ?>
<!-- <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['alert-class'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['alert-class']);
          ?>
        </div>
        <?php endif;?> -->
   <h4>Welcome , <?php echo $_SESSION['username']; ?><h4>

   <?php if (!$_SESSION['verified']): ?>
          <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
            You need to verify your email address!
            Sign into your email account and click
            on the verification link we just emailed you
            at
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div> -->
          <?php header('location: login.php'); ?>
        <?php else: ?> 



        <center><h1>Welcome to the Portal</h1> 
<table border="1" width="560" cellpadding="5" cellspacing="1" bordercolor="black" style="border-right-width:1;"> 
<tr><td colspan="2" align="center"> - Student Information - </td></tr> 
<!-- <tr><td><a href="students_info.php">View Students Profile</a></td>  -->
<td><a href="getProfile.php">Courses Enrolled</a><td></tr> 
<tr><td colspan="2">&nbsp;</td></tr> 
<tr><td colspan="2" align="center"> - Notification - </td></tr> 
<tr><td><a href="material.php">Materials</a> 
<td><a href="getAnnouncement.php">View Announcement</a>

<tr><td colspan="2">&nbsp;</td></tr>  
</table> 
</center>

          <a href="show_user_profile.php">My Profile</a>
          <a href="enroll_course.html">Enroll in new course</a>

          <a href="change_password.php">Change Password</a>
          
        <?php endif;?>
        <br>
        <a href="index.php?logout=1 " class="logout">logout</a>
        
        <?php include 'footer.php'; ?>
</body>
</html>
        <?php }
        else{ ?>
<html>
<head>

<title>Homepage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="master.css">
</head>
<body>
  <?php include 'header.php'; ?>
<!-- <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['alert-class'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['alert-class']);
          ?>
        </div>
        <?php endif;?> -->
   <h4>Welcome , <?php echo $_SESSION['username']; ?><h4>

   <?php if (!$_SESSION['verified']): ?>
          <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
            You need to verify your email address!
            Sign into your email account and click
            on the verification link we just emailed you
            at
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div> -->
          <?php header('location: login.php'); ?>
        <?php else: ?> 



        <center><h1>Welcome to the Portal</h1> 
<table border="1" width="560" cellpadding="5" cellspacing="1" bordercolor="black" style="border-right-width:1;"> 
<tr><td colspan="2" align="center"> - Student Information - </td></tr> 
<!-- <tr><td><a href="students_info.php">View Students Profile</a></td>  -->
<td><a href="getProfile.php">Courses Taken</a><td></tr> 
<tr><td colspan="2">&nbsp;</td></tr> 
<tr><td colspan="2" align="center"> - Notification - </td></tr> 
<tr><td><a href="material.php">Materials</a> 
<td><a href="getAnnouncement.php">View Announcement</a>
<br><a href="create_announcement.php">Create Announcement</a></td></tr> 
<tr><td colspan="2">&nbsp;</td></tr>  
</table> 
</center>

          <a href="show_user_profile.php">My Profile</a>
          <a href="take_course.html">take in new course</a>

          <a href="change_password.php">Change Password</a>
          
        <?php endif;?>
        <br>
        <a href="index.php?logout=1 " class="logout">logout</a>
        
        <?php include 'footer.php'; ?>
</body>
</html>
      <?php  } ?>
        