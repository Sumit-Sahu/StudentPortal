<?php require_once 'controllers/authController.php'; 
if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}
?>
<html>
<head>

<title>Change Password</title>
</head>
<body>
    <form method="post" action="change_password.php" >
    <h3 >Change your Password</h3>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
        <table border="1" >
            <tr>
                <td><label for="password">New Password</label></td>
                <td><input type="password" name="password" ></td>
            </tr>
           
            <tr>
                <td><label for="password"> Confirm New Password</label></td>
                <td><input name="passwordConf" type="password" ></input></td>
            </tr>
             
            
        </table>
        <button type="submit" name="change-password-btn">Change Password</button>          

		
        
    </form>
</body>
</html>