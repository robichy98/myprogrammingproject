<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Laundry Room Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>	
  <form method="post" action="register.php" style="border:1px solid #ccc">
    <?php include('errors.php'); ?>
    <div class="container">
      <h1>Registration</h1>
      <hr>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email">

      <label for="uId"><b>User Id</b></label>
      <input type="text" placeholder="Enter Your User ID" name="user_id">

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password_1">

      <label for="confirmPass"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="password_2">

      <div class="clearfix">
        <button type="submit" class="signupbtn" name="reg_user">Sign Up</button>
      </div>
      
      <p>
          Already a member? <a href="login.php">Sign in</a>
      </p>
    </div>
  </form>
</body>
</html>