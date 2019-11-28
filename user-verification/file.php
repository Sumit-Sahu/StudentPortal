<?php 
require 'base.php' ;

// session_start(); 
 //require 'config/db.php';
// if(!isset($_SESSION['id'])){
//     header('location: login.php');
//     exit();
// }

$email = $_SESSION['email'];
?>


<style media="screen">
  .mat a{
    text-decoration: none;
  }

  .mater{
    height:auto;
  }

  /* .vernav{
    padding-left:45px;
    text-decoration: none;
    color:black;
    top:0px;
    margin-top:138px;
    box-shadow: grey 0px 2px 10px;
    background:linear-gradient(to right,rgba(220,220,220,1),rgba(222,222,222,0.5));
  }

  .vernav a{
    text-decoration: none;
    color:black;
    border-bottom:1px solid white;
    padding-left:10px;
    padding:right:10px;
  } */

  .materialss{
    height:auto;
    margin-left:15vw;
    font-family: 'Sanchez', serif;
  }

  .materialss a{
    color:white;
    text-decoration:none;
  }

  .materialss a:hover{
    color:white;
    text-decoration:none;
  }

  .headcourse{
    font-family: 'Rajdhani', serif !important ;
    text-align:center;
  }

</style>



<div class="mater">
  <h2 class="headcourse">Course Materials</h2>


  <div class="materialss">

    <ol>
        

    
<?php




 
if($_SESSION['designation']=='faculty'){
    $sql = "SELECT * FROM uploads WHERE faculty_email='$email' ORDER BY date DESC" ;
$stmt=mysqli_query($conn,$sql) or die(mysqli_error($conn));
//echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
if(mysqli_num_rows($stmt)>0){
     
        
    while($row = mysqli_fetch_array($stmt)){

        echo "<li>

        <div class='mat'>
          <h3>".$row['title']."</h3>
          <h4>".$row['branch']."</h4>
          <h4>Date uploaded ".$row['date']."</h4>
          <h4>".$row['description']."</h4>
          <button type='button' class='btn btn-primary' name='button'><a href='".$row['file']."' download='True'>Download</a></button>

        </div>
      <hr>
      </li>";
        
        // $file_id = $row['id'];
        // $file_title=$row['title'];
        // $file_description=$row['description'];
        // $file_date=$row['date'];
        // $file=$row['file'];
        // $file_branch=$row['branch'];
        // $file_year=$row['year'];
        // $file_course_id=$row['course_id'];

        // echo "<a href='uploaded_files/$file' > $file_title </a><br />";
    }
    

}else{
    echo "<script>alert('nothing is here,try to upload') </script>";
}

}else{
    $branch=$_SESSION['branch'];
    $batch=$_SESSION['batch'];
    // echo $_SESSION['name'] .$_SESSION['batch'];
    $sql = "SELECT * FROM uploads WHERE branch='$branch' AND year='$batch' ORDER BY date DESC" ;
    // echo '<p><strong>SQL Query</strong><br />'.$sql.'</p>';
    $stmt=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($stmt)>0){
         
            
        while($row = mysqli_fetch_array($stmt)){

            echo "<li>

        <div class='mat'>
          <h3>".$row['title']."</h3>
          <h4>".$row['branch']."</h4>
          <h4>Date uploaded ".$row['date']."</h4>
          <h4>".$row['description']."</h4>
          <button type='button' class='btn btn-primary' name='button'><a href='".$row['file']."' download='True'>Download</a></button>

        </div>
          <hr>
      </li>";
        
            
            // $file_id = $row['id'];
            // $file_title=$row['title'];
            // $file_description=$row['description'];
            // $file_date=$row['date'];
            // $file=$row['file'];
            // $file_branch=$row['branch'];
            // $file_year=$row['year'];
            // $file_course_id=$row['course_id'];
    
            // echo "<a href='uploaded_files/$file' > $file_title </a><br />";
        }
        
    
    }else{
        echo "<h2>nothing is here,No new notification</h2>";
    }

}

?>
</ol>

</div>

</div>
<?php

require 'footer.php';
?>





 
