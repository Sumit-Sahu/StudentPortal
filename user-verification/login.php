<!-- <?php require_once 'controllers/authController.php'; ?>
<html>
<head>

<title>Login</title>
</head>
<body>
    <form method="post" action="login.php" >
    <h3 >Login</h3>
    
        <table border="1" >
            <tr>
                <td><label for="username">Username or Email</label></td>
                <td><input type="text" name="username" ></td>
            </tr>
           
            <tr>
                <td><label for="password">Password</label></td>
                <td><input name="password" type="password" ></input></td>
            </tr>
             
            
        </table>
        <button type="submit" name="login-btn">Login</button>          

		<p>Not yet a member? <a href="signup.php">Sign Up</a></p>
        <div style="font-size: 0.8em; text-align:center;">
        <a href="forgot_password.php">Forgot Password?</a>
        </div>
        
    </form>
</body>
</html> -->


<?php require_once 'controllers/authController.php'; ?>

<html>
<head>

<title>Sign in</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="master.css">
</head>
<body>
<div class="signupblock1">

<h1 id="signuph1">Sign in Here</h1>

<div id="signinform">

  <div class="supform">

    <div class="header-logo">
      <i class="fas fa-user-graduate"></i>
    </div>
    <form method="post" action="login.php" >
    <h3 >Sign in</h3>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


         
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['alert-class'] ?>">
          <?php

            echo $_SESSION['message'];echo $_SESSION['email'];
            unset($_SESSION['message']);
            unset($_SESSION['alert-class']);
          ?>
        </div>
        <?php endif;?>

                <!-- <label for="username">Username</label>  -->
                 <input class="form-control" type="text" name="username" placeholder="Username or Email" value="<?php echo $username; ?>"> 
             
             
                 <!-- <label for="designation">designation</label>  -->
                 
                   
             
                 <!-- <label for="password">Password</label>  -->
                 <input class="form-control" name="password" placeholder="Password" type="password" ></input> 
             
             
                 
        <button type="submit" class="btn btn-info my-3" name="login-btn" >Sign in</button>   

        <a href="signup.php"> <button type="button" class="btn btn-primary" name="button">Sign up</button></a>

        <div style="font-size: 1em;  text-align:center ">
        <a href="forgot_password.php" style="color:red">Forgot Password?</a>
        </div>       

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