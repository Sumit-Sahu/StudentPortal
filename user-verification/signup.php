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
    <form method="post" action="signup.php" >
    <h3 >Register</h3>
    <?php if(count($errors) > 0): ?>
        <!-- <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div> -->
    <?php endif; ?>

                <!-- <label for="username">Username</label>  -->
                 <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required> 
             
             
                 <!-- <label for="designation">designation</label>  -->
                 
                    <select class="form-control" placeholder="Designation" name="designation" required>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                </select>
                 
             
             
                 
                 
                    <select class="form-control" placeholder="Branch" name="branch" required>
                    <!-- <option value="">Branch</option> -->
                    <option value="cse">CSE</option>
                    <option value="ece">ECE</option>
                    <option value="mech">MECH</option>
                </select>
                 
             
             
                 <!-- <label for="email">Email</label>  -->
                 <input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required> 
                
             
             
                 <!-- <label for="password">Password</label>  -->
                 <input class="form-control" name="password" placeholder="Password" type="password" required></input> 
             
             
                 <!-- <label for="passwordConf"> Confirm Password</label>  -->
                 <input class="form-control" name="passwordConf" placeholder="Confirm Password"  type="password" required></input> 
               
        <button type="submit" class="btn btn-primary my-3" name="signup-btn" >Sign Up</button>   
        <a href="login.php"> <button type="button" class="btn btn-info" name="button">Login</button></a>       

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