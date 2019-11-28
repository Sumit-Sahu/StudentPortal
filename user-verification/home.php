<html>
    <?php require 'base.php' ;
    
// if(isset($_GET['token'])){
//     $token=$_GET['token'];
    
//     verifyUser($token);
    
// }
// if(isset($_GET['password-token'])){
//   $passwordToken=$_GET['password-token'];
  
//   resetPassword($passwordToken);
  
// }

// if(!isset($_SESSION['id'])){
//     header('location: h.php');
//     exit();
// }
    ?>

<style media="screen">
  .hpage{
    margin-bottom:25px;
  }

  .txtcol{
    margin-top: 22vh;
  }

  .homepageinfo{
    /* box-shadow: black 0px 1px 10px; */
    margin-bottom:6vh;
    margin-top:0px !important;

  }

  .homecol{
    height:200px;
    width:50px !important;
    box-shadow:black 0px 1px 10px;
    background-color: rgb(77, 64, 51);
    margin:3px;
    color:white;
    font-weight: 600;
    font-size: 1.3rem;
  }

  .homecol img{
    margin-top:15px;
    margin-bottom:8px;
  }
  .homecol a{
    color:white;
    text-decoration:none;
  }

</style>



<div class="row hpage" align="center" style="width:100vw">
  <div class="col-lg" style="width:40vw">
    <img src="homepic.png" alt="">
  </div>

  <div class="col-lg txtcol">
    <h1 class="mySlides">"Don’t let what you <br> cannot do interfere with <br> what you can do." </h1>
    <h1 class="mySlides">"Successful and unsuccessful people <br> do not vary greatly in their abilities.<br> They vary in their desires to <br> reach their potential."</h1>
    <h1 class="mySlides">"Strive for progress, not <br> perfection".</h1>
    <h1 class="mySlides">"Failure is the opportunity to begin <br> again more intelligently."</h1>
    <h1 class="mySlides">"Our greatest weakness lies in giving up.<br> The most certain way to succeed is <br> always to try just one more time."</h1>
    <h1 class="mySlides">"You’ve got to get up every morning with <br> determination if you’re going to <br> go to bed with satisfaction"</h1>
    <h1 class="mySlides">"There are no shortcuts to <br> any place worth going."</h1>
  </div>

</div>

<!-- #CE9D1C -->

  <div class="homepageinfo" align="center">
    <div class="row">
    <div class="homecol col-sm" >
      <a href="https://www.iiitdmj.ac.in/academics/calendar.php" target="blank"><img src="calendar.png" alt=""><br>
      Academic Calendar</a>
    </div>
    <div class="homecol col-sm">
      <a href="available_courses.php" ><img src="enrolled.png" alt=""><br>
        Courses Available</a>
    </div>
    <div class="homecol col-sm">
      <a href="course_enrolled.php"><img src="courses_avail.png" alt=""><br>
        Courses Enrolled</a>
    </div>
  </div>
  <div class="row">
    <div class="homecol col-sm">
      <a href="getAnnouncement.php" ><img src="notification.png" alt=""><br>
        Notifications</a>
    </div>
    <div class="homecol col-sm">
      <a href="file.php" ><img src="material.png" alt=""><br>
        Materials</a>
    </div>
    <div class="homecol col-sm">
      <a href="show_user_profile.php"><img src="profile.png" alt=""><br>
        Profile</a>
    </div>
  </div>
  <div class="row">
    <div class="homecol col-sm">
      <a href="https://www.iiitdmj.ac.in/academics/curriculum.php" target="blank"><img src="curriculum.png" alt=""><br>
        Curriculum</a>
    </div>
    <div class="homecol col-sm">
      <a href="http://result.iiitdmj.ac.in/" target="blank"><img src="grade.png" alt=""><br>
        Grade Sheet</a>
    </div>
    <div class="homecol col-sm">
      <a href="https://www.iiitdmj.ac.in/about_us.php" target="blank"><img src="aboutus.png" alt=""><br>
        About Us</a>
    </div>
  </div>
  </div>




<script type="text/javascript">

  var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 11000); // Change image every 2 seconds
}



</script>
</html>
<?php require 'footer.php' ?>
