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
	<?php $db = mysqli_connect('localhost', 'root', '', 'mentor');
		$sql="SELECT MID FROM mentor WHERE MNAME='$uname'";
		$result =mysqli_query($db,$sql);

	 ?>
	<form > 
		<!method="post" action="#"-- display validation error here -->
		<div class="input-group">
		<label>Roll No.</label>
		<input type="text" name="rollno" required value="<?php echo $rollno;  ?>">
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