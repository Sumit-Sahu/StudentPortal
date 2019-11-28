<!-- <?php require_once 'controllers/authController.php'; ?>
<html>
<head>

<title>Forgot Password</title>
</head>
<body>
    <form method="post" action="forgot_password.php" >
    <h3 >Recover your Password</h3>
    <p>
    Please enter your email address you used to sign up
     on portaland we will assist you in recovering your password.
    </p>

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
        
                <input type="email" name="email" >
           
        <button type="submit" name="forgot-password">Recover your Password</button>          

        
    </form>
</body>
</html> -->



<?php require_once 'controllers/authController.php'; ?>

<html>
<head>

<title>Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="master.css">
</head>
<body>
<div class="signupblock1">

<h1 id="signuph1">Sign Up Here</h1>

<div id="signinform">

  <div class="supform">

    <div class="header-logo">
      <i class="fas fa-user-graduate"></i>
    </div>
    <form method="post" action="forgot_password.php" >
    <h3 >Recover your Password</h3>
    <p style="color: tomato">
    Please enter your email address you used to sign up
     on portaland we will assist you in recovering your password.
    </p>

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

                <!-- <label for="username">Username</label>  -->
                 <input class="form-control" type="email" name="email" placeholder="Email" > 
             
             
                 
               
        <button type="submit" class="btn btn-info my-3" name="forgot-password" >Recover </button>   
        <a href="login.php"> <button type="button" class="btn btn-primary" name="button">Sign in</button></a>       

		<!-- <p>Already have an account? <a >Login Here</a></p> -->
    </form>

    </div>

      <div id="supimage">
        <img src="Student.png" alt="">

      </div>

    </div>

    <div class="lline">

    </div>


  </div>

</body>
</html>