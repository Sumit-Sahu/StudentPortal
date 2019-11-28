<?php require_once 'controllers/authController.php'; 

if($_SESSION['designation']=='student'){


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complete Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Complete Profile</h2>
  
  <form action="my_profile.php" method="post" class="was-validated">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="rollno">rollno:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Roll No" name="rollno" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="batch">Year of admission:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter year of admission" name="batch" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="pwd" placeholder="Enter Date of birth" name="dob" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    
    <button type="submit" class="btn btn-primary" name="student-btn">Submit</button>
  </form>
</div>


</body>
</html>
<?php 
}
else{
?>
<html lang="en">
<head>
  <title>Complete Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Complete Faculty Profile</h2>
  
  <form action="my_profile.php" method="post" class="was-validated">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      
      
    <div class="form-group">
      <label for="dob">Post:</label>
      <select class="form-control" placeholder="Designation" name="post" required>
                    <option value="Professor">Professor</option>
                    <option value="Assistance_Professor">Assistance_Professor</option>
                    <option value="Dean">Dean</option>
                    <option value="Head Of Department">Head Of Department</option>

                    
                </select>
      
      
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I have read alll terms and conditions,and agree to all.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" class="btn btn-primary" name="faculty-btn">Submit</button>
  </form>
</div>


</body>
</html>

<?php }
?>