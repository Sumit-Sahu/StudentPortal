<?php
require 'base.php'; 
//session_start();
    // $sql = "SELECT `id`, `title`, `views`, `type` FROM uploads";
    // $result = $conn->query($sql);

    // $pagetitle = "All Uploads";
    //  $site_name = "IIIT JABALPUR";
     $site_twitter = "iiit jabalpur"; 
    //$uploadDirectory = __DIR__."/";
     //include 'customisation.php'; 
?>

<!doctype html>
<html>

<head>
    <title>IIIT UPLOADS </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
    
</head>

<body>

    

    <?php if($_SESSION['designation']=='faculty'){
    ?>

<div id="content">

    <h1> Upload </h1>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file" ><br />
        <input type="text" id="title" name="title" placeholder="Title" required/><br />
        
        <input type="year" id="title" name="batch" placeholder="For which year batch" required/><br />
        <textarea id="description" name="description" placeholder="Description" rows="3"></textarea><br />
        <button type="submit"  name="upload" class="btn btn-info">Upload</button>
        
    </form>

    

    <?php //include('file.php'); ?>

</div>
    <?php } else{ 
        include('file.php');

        
    } ?>


<?php include 'footer.php'; ?>
</body>
</html>

