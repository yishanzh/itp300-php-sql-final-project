<?php

//session_start();

require 'config.php';


if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	//user not logged in

if (isset($_POST['username']) && isset($_POST['password']) ){
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$password = hash('sha256', $_POST['password']);
	echo ($password);

	$sql = "SELECT *
			FROM user
			WHERE name = '" . $_POST['username'] . "'
						AND password = '" . $password . "';";

	$results = $mysqli->query($sql);

	if (!$results) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	if (empty($_POST['username']) || empty($_POST['password']) ) {
		//missing username or password.
		$error = "Please enter username and password.";
	} elseif ($results->num_rows == 1 ) {
		//valid credentials. log in the user.
		$row = $results->fetch_assoc();
		$_SESSION['user_id'] = $row['user_id'];

		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $_POST['username'];
		header('Location: index.php');
	} else {
		$error = "Invalid username or password.";
	}
}

} else {
	//user already log in
	header('Location: index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- Header and Navigation Bar -->
  <div id="header">

  <h1> S U S A N の 私 服 </h1>
  <nav class="navbar navbar-expand-lg navbar-light bg-light nav">
<!--   <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="clothings.php">Clothing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shoes.php">Shoes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accessories.php">Accessories</a>
      </li>
    </ul>
  </div>
     <a href="registration.php" role="button" class="btn btn-primary">Sign up</a>


</nav>
    
</div>
<!-- End of Header and Nav Bar -->

<div class="container" style="margin-top: 15%;">
		<div class="row">
			<h5 class="col-12 mt-4 mb-4 text-center">Login</h5>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="login.php" method="POST">

			<div class="row mb-3">
				<div class="font-italic text-danger col-sm-9 ml-sm-auto">
					<!-- Show errors here. -->
					<?php
						if ( isset($error) && !empty($error) ) {
							echo $error;
						}
					?>
				</div>
			</div> <!-- .row -->
			

			<div class="form-group row">
				<label for="username-id" class="col-sm-4 col-form-label text-sm-right">Username:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="username-id" name="username">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="password-id" class="col-sm-4 col-form-label text-sm-right">Password:</label>
				<div class="col-sm-4">
					<input type="password" class="form-control" id="password-id" name="password">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-4"></div>
				<div class="col-sm-8 mt-2">
					<button type="submit" class="btn btn-primary">Login</button>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Cancel</a>
				</div>
			</div> <!-- .form-group -->
		</form>

		<div class="row">
			<div class="col-sm-8 ml-sm-auto">
				<a href="registration.php">Create an account</a>
			</div>
		</div> <!-- .row -->

	</div> <!-- .container -->








<!-- Social Media Sprites -->

<div id="social-media">
      <div class="social-media-row">
        <a href="https://www.facebook.com/" id="fb"></a>
        <a href="https://twitter.com/?lang=en" id="tr"></a>
        <a href="https://plus.google.com/" id="gplus"></a>
        <a href="https://www.instagram.com/" id="ins"></a>
      </div>
</div> 
<!-- End of Sprites -->

<!-- Footer -->

<div id="footer">
      Susan Zheng &copy; 2018
</div>
<!-- end of footer -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>



