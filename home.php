<?php 
  session_start(); 

  if (!isset($_SESSION['stud_id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['stud_id']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		  <!-- notification message -->
		  <?php if (isset($_SESSION['success'])) : ?>
		  <div class="error success" >
			  <h3>
			  <?php 
				  echo $_SESSION['success']; 
				  unset($_SESSION['success']);
			  ?>
			  </h3>
		  </div>
		  <?php endif ?>
	
		<!-- logged in student information -->
		<?php  if (isset($_SESSION['stud_id'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['stud_id']; ?></strong></p>
			<p> <a href="home.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
	
	<h1>A. Student Details</h1>
	<form id="studentForm" method="POST" action="submit.php" onsubmit="validateInput()" autocomplete="off">
		<label class="label" for="name">Name:</label>
		<input class="input" type="text" id="name" name="name" maxlength="50" required>

		<label class="label" for="matricno">Matric Number:</label>
		<input class="input" type="text" id="matricno" name="matricno"  pattern="[0-9]{7}" maxlength="7" placeholder="xxxxxxx" required>

		<label class="label" for="currentAddress">Current Address:</label>
		<textarea class="input" id="currentAddress" name="currentAddress" required></textarea>

		<label class="label" for="homeAddress">Home Address:</label>
		<textarea class="input" id="homeAddress" name="homeAddress" required></textarea>

		<label class="label" for="email">Email (Gmail only):</label>
		<input class="input" type="email" id="email" name="email" maxlength="50" required>

		<label class="label" for="phoneNumber">Mobile Phone Number:</label>
		<input class="input" type="tel" id="phoneNumber" name="phoneNumber"  pattern="[0-9]{3}-[0-9]{7}" placeholder="xxx-xxxxxxx" required>

		<label class="label" for="homeNumber">Home Phone Number (Emergency):</label>
		<input class="input" type="tel" id="homeNumber" name="homeNumber" pattern="[0-9]{3}-[0-9]{7}"  placeholder="xx-xxxxxxxx">
		

		<button class="button" type="submit" name="submit" onclick = "displayAlert()">Submit</button>


	</form>
	<div id="error-message"></div>
	<script src="validateInput.js"></script>
	


</body>
</html>