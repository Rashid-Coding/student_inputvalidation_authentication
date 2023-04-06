<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>

    <div class="input-group">
  	  <label>Stundet ID</label>
  	  <input type="number" name="stud_id" pattern="[0-9]{7}" maxlength="7" placeholder="xxxxxxx" value="<?php echo $stud_id; ?>">
  	</div>


  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" pattern="^[a-z0-9._%+-]+@gmail\.com$" value="<?php echo $email; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>

  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already registered? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>