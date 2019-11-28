<?php require 'base.php' ;
 ?> 


<div class="courses_enr" style="width:40vw; margin-left:30vw; margin-bottom:12vh;" align="center">

      <h3>Courses Enrolled</h3><br>

      <div class="list-group">
        <?php
      if($_SESSION['designation']=='student'){
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
    }
    else{
        while($row = mysqli_fetch_array($result)) 
     
    { 
        echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['course_id'] . "      " . $row['name']."</a>";
        
    // echo "<tr><td>" . $row['course_id'] . "</td> 
    // <td>" . $row['name']."</td>  
    // </tr>"; 
    // echo "<br/>"; 
    } 
    
     
    }

 }
else if($_SESSION['designation']=='faculty'){
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
        echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['course_id'] . "      " . $row['name']."</a>"; 
    // echo "<tr><td>" . $row['course_id'] . "</td> 
    // <td>" . $row['name']."</td>  
    // </tr>"; 
    // echo "<br/>"; 
    } 
    
    // echo "</table></center>"; 
    }    

}
?>
</div>
</div>

<?php require 'footer.php' ?>