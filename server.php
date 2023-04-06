<?php
session_start();

$stud_id = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'was');


if (isset($_POST['reg_user'])) {
 
  $stud_id = mysqli_real_escape_string($db, $_POST['stud_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($stud_id)) { array_push($errors, "Student_ID is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // check the database to make sure user does not already exist with the same student ID and/or email
  $user_check_query = "SELECT * FROM student_login WHERE stud_id='$stud_id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['stud_id'] === $stud_id) {
      array_push($errors, "Student_ID already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $email = md5($email);//encrypt the email before saving in the database
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO student_login (stud_id, email, password) 
  			  VALUES('$stud_id', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['stud_id'] = $stud_id;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $stud_id = mysqli_real_escape_string($db, $_POST['stud_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($stud_id)) {
  	array_push($errors, "Student_ID is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $email = md5($email);
  	$password = md5($password);
  	$query = "SELECT * FROM student_login WHERE stud_id='$stud_id' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['stud_id'] = $stud_id;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong student ID/password combination");
  	}
  }
}

?>