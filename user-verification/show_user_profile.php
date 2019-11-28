




<?php require 'base.php' ?>
  <style media="screen">
    .abb{
      height:80vh;
      font-family: 'Rajdhani', sans-serif;
      margin-left:10vw;
    }
    .procard{
      box-shadow: grey 0px 2px 10px;
      margin-right: 125px;
      width:28vw;
      height:62vh;
      border-radius: 2%;
    }

    .cardimg{
      border-top-left-radius: 2%;
      border-top-right-radius: 2%;
      border-bottom: 2px solid grey;
    }

    .usercard{
      text-align: right;
      padding-top: 15px;
      padding-right: 20px;
      font-size: 2.2rem;
      text-transform: uppercase;
    }

    .details{
      margin-top: 10vh;
    }

  </style>

  <div class="abb">
  <?php
      if($_SESSION['designation']=='student')  {   ?>

    <div class="row">
      <div class="procard" >
      <img class="cardimg" src="propic.png" alt="" style="width:28vw; height:50vh;">
      <h4 class="usercard"> <?php echo $_SESSION['username'] ;?></h4>
      </div>

      <div class="col-lg details">
        <h3>Student Name   :  <?php echo $_SESSION['name'] ;?></h3>
        <h3>Email          :   <?php echo $_SESSION['email'] ;?></h3>
        
        
        "<h3>Date of Birth  :  <?php echo $_SESSION['dob'];?></h3>
        <h3>Batch          : <?php echo   $_SESSION['batch'];?></h3>
        <h3>Roll No.      :  <?php echo $_SESSION['roll_no'];?></h3>"
        
        
        <h3>Branch         :  <?php echo $_SESSION['branch'] ;?></h3>";
      </div>

    </div>
 </div>

    <div class="courses_enr" style="width:40vw; margin-left:30vw; margin-bottom:12vh;" align="center">

      <h3>Courses Enrolled</h3><br>

      <div class="list-group">
      <?php
        
    $query = "SELECT course_enrolled.course_id,course.name
    FROM course_enrolled ,course
    WHERE course_enrolled.course_id=course.course_id
    AND student_email =  '{$_SESSION['email']}' ";
    //Execute query 
    $result = mysqli_query($conn,$query); 
    // echo "<center><h1>Course Enrolled</h1>"; 
    // echo "<table border='1' cellpadding = '10'> 
    // <tr><th>course Code</th> 
    // <th>Course name</th> 
    // </tr>"; 
    if(!$result){
        echo "<a href='#' class='list-group-item list-group-item-action'>You have not enrolled in any course</a>
        ";
    } else{
        while($row = mysqli_fetch_array($result)) 
     
        { 
        echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['course_id'] . "      " . $row['name']."</a>
        ";
        
    // echo "<tr><td>" . $row['course_id'] . "</td> 
    // <td>" . $row['name']."</td>  
    // </tr>"; 
    // echo "<br/>"; 
        } 
      }
    }
  
     
    

 
else if($_SESSION['designation']=='faculty'){ ?>
  <div class="row">
      <div class="procard" >
      <img class="cardimg" src="propic.png" alt="" style="width:28vw; height:50vh;">
      <h4 class="usercard"> <?php echo $_SESSION['username'] ;?></h4>
      </div>

      <div class="col-lg details">
        <h3> Name   :  <?php echo $_SESSION['post'];?> <?php  echo $_SESSION['name'] ;?></h3>
        <h3>Email          :   <?php echo $_SESSION['email'] ;?></h3>
        
        
       
        
        
        <h3>Branch         :  <?php echo $_SESSION['branch'] ;?></h3>";
      </div>

    </div>
 </div>
<?php
    $query = "SELECT DISTINCT course_instructor.course_id,course.name
    FROM course_instructor ,course
    WHERE course_instructor.course_id=course.course_id
    AND course_instructor.faculty_id='{$_SESSION['email']}' ";
    
    //Execute query 
    $result = mysqli_query($conn,$query); 
    // echo "<center><h1>Taken Enrolled</h1>"; 
    // echo "<table border='1' cellpadding = '10'> 
    // <tr><th>course Code</th> 
    // <th>Course name</th> 
    // </tr>"; 
    if(!$result){
        echo "<a href='#' class='list-group-item list-group-item-action'>You have not enrolled in any course</a>
        ";
    }
    else{
        while($row = mysqli_fetch_array($result)) 
     
    { 
        echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['course_id'] . "      " . $row['name']."</a>
        "; 
    // echo "<tr><td>" . $row['course_id'] . "</td> 
    // <td>" . $row['name']."</td>  
    // </tr>"; 
    // echo "<br/>"; 
    } 
    
    echo "</table></center>"; 
    }    

}
?>
</div>
      <!-- <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
          Cras justo odio
        </a>
        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
      </div> -->




  </div>
  <?php require 'footer.php'; ?>

