<?php require 'base.php';
?>
<html lang="en">
<head>
    
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <form action="enroll_course.php" class="was-validated" method = "post">
        <!-- <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div> -->
        <div class="form-group">
          <label for="courseid">Course ID:</label>
          <input type="text" class="form-control" id="courseid" placeholder="Enter course ID" name="courseid" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" required> I agree 
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Check this checkbox to continue.</div>
          </label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" value="enroll">Submit</button>
      </form>
    </div>

  </body>
  

  </html>
  <?php require 'footer.php'; ?>
