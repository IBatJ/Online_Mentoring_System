<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hultz Prize</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Simple Registration Form</h2>
	</div>
	
	<form method="post" action="#"> 
		<!-- display validation error here -->
		<?php include('error.php') ?>
		<div class="input-group">
		<label>Roll No.</label>
		<input type="text" name="rollno" required value="<?php echo $id;  ?>">
		</div>
		<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" required value="<?php echo $name;  ?>">
		</div>
		<div class="input-group">
		<label>Email</label>
		<input type="text" name="email">
		</div>
		<div class="input-group">
		<label>Password</label>
		<input type="password" name="pass">
		</div>
		<div class="input-group">
			<button type="submit" name="mentee_reg" class="btn">Register</button>
		</div>
	</form>
</body>
</html>