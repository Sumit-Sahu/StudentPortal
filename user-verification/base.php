<?php require_once 'controllers/authController.php';
require_once 'config/constants.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   
    <link rel="stylesheet" href=" css/animate.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/style.css">

      <script type="text/javascript" src="js/abc.js">  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Amiri|Old+Standard+TT|Open+Sans+Condensed:300|Rajdhani|Sanchez&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0b34da37e0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

  </head>

  <style media="screen">
  html{
      overflow-y:scroll;
      overflow-x:hidden;
    }
    .spp{
      padding-top: 20px;
    }

    .nvb{
      position:fixed;
      margin-left: 0px !important;
      padding-right: 50px !important;
    }


    .notif{
      z-index: 350;
      box-shadow: 0px 5px 10px black;
      box-sizing: border-box;
      height:70vh;
      width:30vw;
      position:absolute;
      background-color: white;
      margin-left: 15vw;
      display:none;
    }

    .collegename{
      text-decoration:none;
      /* margin-top: 35px; */
      font-family: 'Sanchez', serif;
      color:black;
      font-size: 1.6rem;
    }

    .collegename:hover{
      color:black;
    }

    .logoimage{
      top:0px !important;
       width:60px;
       height:70px;
    }

    .navcolor{
      color:white;
      background-color: #05395C;
    }

    .navcolor a{
      color:white;
      text-decoration: none;
    }

    .navcolor a:hover{
      color:white;
    }

    .endsec{
      width:100vw;
      padding:50px;
      padding-bottom:10px;
      padding-top:15px;
      color:white;
      background-color:rgb(19, 19, 19);
      bottom:0;
      margin-top: 10px;
    }

    .endsec ul li.first {
    display: inline-block;
    font-family: 'Open Sans Condensed', sans-serif;
    width: 56%;
    float: left;
    padding: 0px;
    margin: 0px;
  }

  .endsec a{
    text-decoration:none;
    color:#B9B9B9;
  }

  .endsec a:hover{
    text-decoration:none;
    color:#B9B9B9;
  }

  .endsec ul{
    list-style-type:none;
  }

  .foothead{
    color:#B9B9B9;
    font-family: 'Open Sans Condensed', sans-serif;
    padding-bottom:15px;
  }

  .dropdown-menu{
    z-index:25;
  }

  #navbarDropdown{
    width:28vw;
  }

  </style>


  <body>
<a class="navbar-brand collegename" href="">  <span><img class="logoimage" src="abc.png"></span> <span> PDPM IIITDM JABALPUR</span></a>

    <nav class="navbar navbar-expand-lg navcolor">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> Student Portal </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php" style="font-weight:600;">Student Portal <span class="sr-only">(current)</span></a>
          </li>
          <?php 
          if($_SESSION['designation']=='student'){
            echo " <li class='nav-item'>
            <a class='nav-link' href='enroll_course_form.php'>Enroll Course</a>
          </li> ";

          }
          else if($_SESSION['designation']=='faculty'){
            echo "<li class='nav-item'>
            <a class='nav-link' href='material.php'>Upload Material</a>
          </li> <li class='nav-item'>
          <a class='nav-link' href='create_announcement.php'>Make Announcement</a>
        </li> <li class='nav-item'>
        <a class='nav-link' href='take_course_form.php'>Take Course</a>
      </li> ";
          }
          ?>
         
          <li class="nav-item">
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
          </a>
          <ul class="dropdown-menu" style="padding:30px; width:250px;">
          <li class="head text-light bg-dark">
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-12">
                <span>Notifications</span>
              </div>
          </li>

<?php 
          if($_SESSION['designation']=='student'){
    $branch = $_SESSION['branch'];
    $batch = $_SESSION['batch']; 
    $query = "SELECT *
    FROM announcement
    WHERE (related_branch='$branch' OR '$branch'='all')
    AND related_batch='$batch'
    ORDER BY date_made DESC ";
    //Execute query 
    $result = mysqli_query($conn,$query); 
    // echo "<center><h1>Announcements</h1>"; 
    // echo "<table border='1' cellpadding = '10'> 
    // <tr><th>Branch</th> 
    // <th>Batch</th> 
    // <th>Announcement</th>
    // </tr>"; 
    $i=0;
    while($row = mysqli_fetch_array($result)) 
     
    { 
      if($i>3){
      break;
      }
      $i++;
      echo "<li class='notification-box'>
      <div class='row'>
        
        <div class='col-lg-8 col-sm-8 col-8'>
          <strong class='text-info'>" . $row['related_branch'] . " " . $row['related_batch']." </strong>
          <div>
          " . $row['description']."
          </div>
          <small class='text-warning'>" . $row['date_made'] . "</small>
        </div>
      </div>
    </li>";
    // echo "<tr><td>" . $row['related_branch'] . "</td> 
    // <td>" . $row['related_batch']."</td>
    // <td>" . $row['description']."</td>
   
    // </tr>"; 
    // echo "<br/>"; 
    echo "<hr>";  
    } 
     
}
else if($_SESSION['designation']=='faculty'){
    $query = "SELECT *
    FROM announcement
    WHERE faculty_id='{$_SESSION['email']}'
    ORDER BY date_made DESC ";
    $result = mysqli_query($conn,$query); 
    
    $i=0;
    while($row = mysqli_fetch_array($result)) 
     
    { 
      if($i>3){
      break;
      }
      $i++;
        
      echo "<li class='notification-box'>
      <div class='row'>
        
        <div class='col-lg-8 col-sm-8 col-8'>
          <strong class='text-info'>" . $row['related_branch'] . " " . $row['related_batch']." </strong>
          <div>
          " . $row['description']."
          </div>
          <small class='text-warning'>" . $row['date_made'] . "</small>
        </div>
      </div>
    </li>";
    // echo "<tr><td>" . $row['related_branch'] . "</td> 
    // <td>" . $row['related_batch']."</td>
    // <td>" . $row['description']."</td>
   
    // </tr>"; 
    // echo "<br/>"; 
    echo "<hr>";  
    } 
    
}
?>


              <!-- <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
              </a> -->
                <!-- <ul class="dropdown-menu"> -->
                  
                  <!-- <li class="notification-box">
                    <div class="row">
                      <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                      </div>
                      <div class="col-lg-8 col-sm-8 col-8">
                        <strong class="text-info">David John</strong>
                        <div>
                          Lorem ipsum dolor sit amet, consectetur
                        </div>
                        <small class="text-warning">27.11.2015, 15:00</small>
                      </div>
                    </div>
                  </li>
                  <li class="notification-box bg-gray">
                    <div class="row">
                      <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                      </div>
                      <div class="col-lg-8 col-sm-8 col-8">
                        <strong class="text-info">David John</strong>
                        <div>
                          Lorem ipsum dolor sit amet, consectetur
                        </div>
                        <small class="text-warning">27.11.2015, 15:00</small>
                      </div>
                    </div>
                  </li>
                  <li class="notification-box">
                    <div class="row">
                      <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                      </div>
                      <div class="col-lg-8 col-sm-8 col-8">
                        <strong class="text-info">David John</strong>
                        <div>
                          Lorem ipsum dolor sit amet, consectetur
                        </div>
                        <small class="text-warning">27.11.2015, 15:00</small>
                      </div>
                    </div>
                  </li>-->
                  <li class="footer bg-dark text-center">
                    <a href="getAnnouncement.php" class="text-light">View All</a>
                  </li>
                </ul>
            </li>
          </ul> 
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"></li>
        </ul>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"></li>
        </ul>



        <ul class="navbar-nav ">
          <li class="nav-item">
            <img src="user.png" style="width:28px; height:28px; margin-top:7px;" alt="">
          </li>

          <li class="nav-item">
            <a class="nav-link" href="show_user_profile.php"><?php echo $_SESSION['username']; ?></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" style="font-weight:600;" href="index.php?logout=1">Logout</a>
          </li>

        </ul>





      </div>
    </nav>



    
    <div class="spp">

    </div>
    


     

  </body>

  <script type="text/javascript">

  $(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});



  </script>


</html>
