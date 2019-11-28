<?php



    session_start();
    require 'config/db.php';
    require_once 'emailController.php';

    $errors=array();
    $username="";
      $email="";
    if(isset($_POST['signup-btn'])){
      $username=$_POST['username'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $passwordConf=$_POST['passwordConf'];
      $designation=$_POST['designation'];
      $branch=$_POST['branch'];
    
        if(empty($username)){
            $errors['username']="Username required";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']="Email addredd is invalid";
        }
        if(empty($email)){
           $errors['email']="Email required";
        }
        if(empty($password)){
            $errors['password']="Password required";
        }
        if($password !== $passwordConf){
           $errors['password']="The two password do not match";
        }
        

        $emailquery="SELECT * FROM users WHERE email=? ";
        $stmt=$conn->prepare($emailquery);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result=$stmt->get_result();
        $userCount=$result->num_rows;
        $stmt->close();

        if($userCount >0){
            $errors['email']="Email already exists ";
        }

        if(count($errors) === 0){
            $password=password_hash($password,PASSWORD_DEFAULT);
            $token=bin2hex(random_bytes(50));
            $verified=false;

            $sql = " INSERT INTO users SET username='$username',designation='$designation', branch='$branch',email='$email', verified =false, token='$token' , password='$password' ";
            $stmt = $conn->prepare($sql);
            //$stmt->bind_param('ssbss',$username,$email,$verified,$token,$password);
            
             if($stmt->execute()){
                $user_id=$conn->insert_id;
                $stmt->close();

                $_SESSION['id']=$user_id;
                $_SESSION['username']=$username;
                $_SESSION['designation']=$designation;
                $_SESSION['branch']=$branch;
                $_SESSION['email']=$email;
                $_SESSION['verified']=$verified;
                sendVerificationEmail($email,$token);

                $_SESSION['message']="You need to verify your email address!
                Sign into your email account and click
                on the verification link we just emailed you
                at ";
                $_SESSION['alert-class']="alert-success";
                header('location: login.php');
                exit();
            }
            else{
                $errors['db_error']="Database error: failed to register";
            }
            
         }
        

    }
    if (isset($_POST['login-btn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username)) {
            $errors['username'] = 'Username or email required';
        }
        if (empty($password)) {
            $errors['password'] = 'Password required';
        }
      
    
        if (count($errors) === 0) {
            $sql = "SELECT * FROM users WHERE username='$username' OR email='$username' ";
            $stmt = $conn->prepare($sql);
           // $stmt->bind_param('ss', $username, $password);
    
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) { // if password matches
                    $stmt->close();
    
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['designation']=$user['designation'];
                    $_SESSION['branch']=$user['branch'];

                    if(!$_SESSION['verified']){
                        $_SESSION['message'] = "You need to verify your email address!
                    Sign into your email account and click
                    on the verification link we just emailed you
                    at ";
                    $_SESSION['alert-class'] = 'alert-success';
                    header('location: login.php');
                    exit(0);
                    }else{
                        if($_SESSION['designation']=='student'){
                            $email=$_SESSION['email'];

                            $sql = " SELECT * FROM student WHERE email='$email' ";
                            // echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
                            $stmt = $conn->prepare($sql);
                            if ($stmt->execute()) {
                                $result = $stmt->get_result();
                                $user = $result->fetch_assoc();
                                $_SESSION['roll_no'] = $user['roll_no'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['batch'] = $user['batch'];
                    $_SESSION['dob'] = $user['dateOfBirth'];
                    $_SESSION['profile_image']=$user['profile_image'];
                   

                    
                            }
                
                        }
                        else if($_SESSION['designation']=='faculty'){
                            $email=$_SESSION['email'];
                            $sql = " SELECT * FROM faculty WHERE email='$email' ";
                            $stmt = $conn->prepare($sql);
                            if ($stmt->execute()) {
                                $result = $stmt->get_result();
                                $user = $result->fetch_assoc();
                                $_SESSION['name'] = $user['name'];
                    $_SESSION['post'] = $user['post'];
                    $_SESSION['profile_image'] = $user['profile_image'];


                            }
                        }
                        

                    }
                   
                    // $email=$user['email'];
                    // $sql = "SELECT * FROM student WHERE email=' $email ' ";
                    // $stmt = $conn->prepare($sql);
                    //  echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
                    //  if ($stmt->execute()) {

                    //     $result = $stmt->get_result();
                    //     $user = $result->fetch_assoc();
                    //     $userCount=$result->num_rows;
                    //     $stmt->close();
                    //     if($userCount > 0){
                    //         $_SESSION['batch'] = $user['batch'];
                    //     $_SESSION['roll_no'] = $user['roll_no'];
                    //     $_SESSION['name'] = $user['name'];
                    //     $_SESSION['dateOfBirth'] = $user['dateOfBirth'];
                        //   header('location: home.php');
                    //     exit(0);

                    //     }else{
                    //         header('location: my_profile.php');
                    //         exit(0);
                    //     }
                        

                    // }else{
                        //  header('location: login.php');
                    //     exit(0);
                    //  }
                     header('location: home.php');
                } else { // if password does not match
                    $errors['login_fail'] = "Wrong username / password";
                }
            } else {
                $_SESSION['message'] = "Database error. Login failed!";
                $_SESSION['type'] = "alert-danger";
            }
        }
    }
  
    if(isset($_POST['student-btn'])){
        $email=$_SESSION['email'];
        $branch=$_SESSION['branch'];
        $roll_no=$_POST['rollno'];
        $name=$_POST['name'];
        $batch=$_POST['batch'];
        $dob=$_POST['dob'];

        $sql = " INSERT INTO student SET email='$email',roll_no='$roll_no',name='$name' ,batch='$batch' ,branch='$branch' ,dateOfBirth='$dob' ";
        $result = $conn->prepare($sql);
        //echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
        if($result->execute()){
            $_SESSION['batch'] =$batch ;
                        $_SESSION['roll_no'] = $roll_no;
                        $_SESSION['name'] = $name;
                        $_SESSION['dateOfBirth'] = $dob;
                        header('location: home.php');
                        exit(0);


        }else{
            echo "error in update profile";
        }

    }
    if(isset($_POST['faculty-btn'])){
        $email=$_SESSION['email'];
        $branch=$_SESSION['branch'];
        $name=$_POST['name'];
        $post=$_POST['post'];

        $sql = " INSERT INTO faculty SET email='$email',name='$name'  ,branch='$branch' ,post='$post' ";
        $result = $conn->prepare($sql);
        //echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
        if($result->execute()){
            $_SESSION['batch'] =$batch ;
                        $_SESSION['roll_no'] = $roll_no;
                        $_SESSION['name'] = $name;
                        $_SESSION['dateOfBirth'] = $dob;
                        header('location: login.php');
                        exit(0);


        }else{
            echo "error in update profile";
        }

    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['verify']);
        header("location: login.php");
        exit();
    }
    

    function verifyUser($token){
       
        global $conn;
        $sql="SELECT * FROM users WHERE token ='$token' ";
        $result=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0){
            $user= mysqli_fetch_assoc($result);
            $update_query="UPDATE  users SET verified='1' WHERE token = '$token' ";
            if(mysqli_query($conn,$update_query)){
                //log user in
                
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] =1;
                $_SESSION['designation'] =$user['designation'];
                $_SESSION['message'] = 'Your email address successfully verified';
                $_SESSION['alert-class'] = 'alert-success';
                header('location: my_profile.php');
                exit(0);

            }
        }else{
            echo 'User not found';
        }
    }

    if(isset($_POST['forgot-password'])){
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']="Email address is invalid";
        }
        if(empty($email)){
           $errors['email']="Email required";
        }
        if(count($errors)==0){
            $sql="SELECT * FROM users WHERE email='$email' ";
            $result=mysqli_query($conn,$sql);
            $user=mysqli_fetch_assoc($result);
            sendPasswordResetLink($email,$user['token']);
            header('location: password_message.php');
            exit(0);
        }
    }
    if(isset($_POST['reset-password-btn'])){
        $password=$_POST['password'];
        $passwordConf=$_POST['passwordConf'];

        if(empty($password) || empty($passwordConf)){
            $errors['password']="Password required";
        }
        if($password !== $passwordConf){
           $errors['password']="The two password do not match";
        }


        $password=password_hash($password,PASSWORD_DEFAULT);
        $email=$_SESSION['email'];

        if(count($errors)==0){
            $sql="UPDATE users SET password='$password' WHERE email='$email' ";
            $result=mysqli_query($conn,$sql);
            if($result){
                header('location: login.php');
                exit(0);
            }
            
        }

    }
    if(isset($_POST['change-password-btn'])){
        $password=$_POST['password'];
        $passwordConf=$_POST['passwordConf'];

        if(empty($password) || empty($passwordConf)){
            $errors['password']="Password required";
        }
        if($password !== $passwordConf){
           $errors['password']="The two password do not match";
        }


        $password=password_hash($password,PASSWORD_DEFAULT);
        $email=$_SESSION['email'];

        if(count($errors)==0){
            $sql="UPDATE users SET password='$password' WHERE email='$email' ";
            $result=mysqli_query($conn,$sql);
            if($result){
                header('location: home.php');
                exit(0);
            }
            
        }

    }


    function resetPassword($token){
        global $conn;
        $sql="SELECT * FROM users WHERE token='$token' ";
        $result=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($result);
        $_SESSION['email']=$user['email'];
        header('location: reset_password.php');
        exit(0);
    }
    

    
?>

     