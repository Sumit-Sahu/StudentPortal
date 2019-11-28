<?php require 'base.php';
?>


<div class="courses_enr" style="width:40vw; margin-left:30vw; margin-bottom:12vh;" align="center">

      <h3>Available Courses </h3><br>

      <div class="list-group">
        <?php
      
    $query = "SELECT *
    FROM course";
    
    //Execute query 
    $result = mysqli_query($conn,$query); 
    // echo "<center><h1>Course Enrolled</h1>"; 
    // echo "<table border='1' cellpadding = '10'> 
    // <tr><th>course Code</th> 
    // <th>Course name</th> 
    // </tr>"; 
    if(!$result){
        echo "<a href='#' class='list-group-item list-group-item-action'>No course Available</a>
        ";
    }
    else{
        while($row = mysqli_fetch_array($result)) 
     
        { 
        echo "<a href='#' class='list-group-item list-group-item-action'> Course Id :". $row['course_id'] . "  <br/>  Course Name:  " . $row['name']."  <br/> Course Description : " . $row['description']."</a>";
        
    // echo "<tr><td>" . $row['course_id'] . "</td> 
    // <td>" . $row['name']."</td>  
    // </tr>"; 
    // echo "<br/>"; 
        }
    }
 
?>
</div>
</div>

<?php require 'footer.php' ?>