<?php require_once 'controllers/authController.php'; 
if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}
?>
<html>
<head>

<title>Reset PASSWORD</title>
</head>
<body>
    <form method="post" action="reset_password.php" >
    <h3 >Reset your Password</h3>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
        <table border="1" >
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" ></td>
            </tr>
           
            <tr>
                <td><label for="password"> Confirm Password</label></td>
                <td><input name="passwordConf" type="password" ></input></td>
            </tr>
             
            
        </table>
        <button type="submit" name="reset-password-btn">Reset Password</button>          

		
        
    </form>
</body>
</html>