<?php
session_start();

// initializing variables
$user_id = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cis350');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user_id)) { array_push($errors, "User id is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same user_id and/or email
  $user_check_query = "SELECT * FROM users WHERE user_id='$user_id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_id'] === $user_id) {
      array_push($errors, "User id already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (user_id, email, password) 
  			  VALUES('$user_id', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['user_id'] = $user_id;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 


// LOGIN USER
if (isset($_POST['login_user'])) {
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($user_id)) {
    array_push($errors, "User id is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE user_id='$user_id' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['user_id'] = $user_id;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong user_id/password combination");
    }
  }
}


// REGISTER SLOTS
if (isset($_POST['reg_slots'])) {
  // receive all input values from the form
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $day = mysqli_real_escape_string($db, $_POST['day']);
  $slots = mysqli_real_escape_string($db, $_POST['slots']);
 

  $query = "SELECT * FROM day WHERE days='$day' AND $slots='Booked'";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) != 1) {
    $query1 = "UPDATE users SET slots='$slots', day='$day' WHERE user_id=$user_id";
    mysqli_query($db, $query1);
    $_SESSION['success'] = "Your timeslot has been booked";
    header('location: index.php');
  }else {
    array_push($errors, "This day timeslot already booked");
  }
}
?>