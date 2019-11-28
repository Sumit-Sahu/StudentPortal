<?php

require 'base.php';



if (isset($_POST['upload'])) {

  //  echo " legemg";
    $filename = $_FILES['file']['name'];
  require "gump.class.php";
  
$gump = new GUMP();

$_POST = $gump->sanitize($_POST); 



$gump->validation_rules(array(
    'title'    => 'required|max_len,60|min_len,3',
    'description'   => 'required|max_len,150|min_len,3',
));
$gump->filter_rules(array(
    'title' => 'trim|sanitize_string',
    'description' => 'trim|sanitize_string',
    ));
$validated_data = $gump->run($_POST);

$file = $_FILES['file']['name'];


    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('pdf', 'txt', 'doc', 'docx', 'ppt' , 'zip','jpg','jpeg','png');
    if (empty($file)) {
echo "<script>alert('Attach a file');</script>";
    }
    else if ($_FILES['file']['size'] <= 0 || $_FILES['file']['size'] > 30720000 )
    {
echo "<script>alert('file size is not proper');</script>";
    }
    else if (!in_array($ext, $validExt)){
        echo "<script>alert('Not a valid file');</script>";

    }
    else {
        $folder  = 'uploaded_files/';
        $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
        $notefile = rand(1000 , 1000000) .'.'.$fileext;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$notefile)){
            $title = $_POST['title'];
            $year = $_POST['batch'];
            $description=$_POST['description'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $type = $_FILES['file']['type'];
            $sql = "INSERT INTO uploads (title, description, date, file,branch,year,faculty_email) 
            VALUES ('$title', '$description', NOW(),'$notefile','{$_SESSION['branch']}','$year','{$_SESSION['email']}')";
            $result = $conn->query($sql);

            echo '<h2>Your File has been submitted successfully<br/> </h2><h1><a href="file.php">Click here to see it</a></h1> <div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/><br/><br/><br/>
            
            
            </div>';

          //echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
        //   echo " legemg";
   
        //   $sql = "SELECT COUNT(id) FROM uploads;";
        //        $result = $conn->query($sql);
        //        $upload = $result->fetch_assoc();
        //        $id = $upload["COUNT(id)"];
      
               
      
            }else{
               print_r($errors);
            }
            require 'footer.php' ;

        

    }


    
}
