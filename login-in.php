<?php 

include 'config.php';

error_reporting(0);

if(!isset($_SESSION))
	session_start();

if (isset($_SESSION['id_user'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['email'] = $row['email'];
		
		$sql = "SELECT name_of_project FROM project WHERE id_user=".$row['id_user']." ORDER BY id_project DESC LIMIT 1";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['last_project'] = $row['name_of_project'];
		}
		header("Location: welcome.php");
		// if ($result->num_rows > 0) {
		// 	$row = mysqli_fetch_assoc($result);
		// 	if ($row['user_type'] == 'admin') {
		// 	$_SESSION['user_name'] = $row;
		// 	header('location: welcome.php');
		// 	}else{
		// 		$_SESSION['user_name'] = $row;
		// 		header('location: project_grad/task_user.php');
		// 	}
		// }
		// -------------------------------------
		// if (mysqli_num_rows($results) == 1) { // user found
		// 	// check if user is admin or user
		// 	$logged_in_user = mysqli_fetch_assoc($results);
		// 	if ($logged_in_user['user_type'] == 'admin') {

		// 		$_SESSION['user'] = $logged_in_user;
		// 		$_SESSION['success']  = "You are now logged in";
		// 		header('location: admin/home.php');		  
		// 	}else{
		// 		$_SESSION['user'] = $logged_in_user;
		// 		$_SESSION['success']  = "You are now logged in";

		// 		header('location: index.php');
		// 	}
		// }
		// -----------------------------------------------
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

    <div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required autocomplete ="on">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required autocomplete="new-password">
			</div>
			<!-- <div class="input-group">
			<label>User type</label>
				<select name="user_type" id="user_type" >
					<option value=""></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div> -->
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>
