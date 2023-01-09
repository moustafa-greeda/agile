<?php 

include 'config.php';

error_reporting(0);

if(!isset($_SESSION))
	session_start();

if (isset($_SESSION['id_user'])) {
    header("Location: welcome.php");
}


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$sql = "SELECT id_user FROM user WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['registred'] = true;

				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				
				header('Location: welcome.php');
			} else {
				echo "<script>alert('Woops! Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required autocomplete ="off">
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required autocomplete ="off">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required autocomplete ="new-password">
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required autocomplete ="new-password">
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login-in.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>