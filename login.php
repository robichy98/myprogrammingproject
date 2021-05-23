<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 
  <form action="login.php" method="post" style="border:1px solid #ccc">
    <?php include('errors.php'); ?>
    <div class="container">
      <h1>Login</h1>
      <hr>

      <label for="uId"><b>User Id</b></label>
      <input type="text" placeholder="Enter Your User ID" name="user_id" required>

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <div class="clearfix">
        <button type="submit" class="signupbtn" name="login_user">Login</button>
      </div>
        Don't have an account? <a href="register.php">Register here</a>
    </div>
  </form>
</body>
</html>