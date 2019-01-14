<?php

require 'config.php';

//DB Connection 

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}

$mysqli->set_charset('utf8');

// var_dump($_SESSION['user_id']);

$sql = "SELECT * FROM user;";
$results = $mysqli->query($sql);
if ($results == false ) {
	echo $mysqli->error;
	exit();
}

$row = $results->fetch_assoc();

//close connection
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Armadio di Susan</title>
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
        <a class="nav-link active" href="index.php">Home  <span class="sr-only">(current)</span></a>
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



<?php if (!isset($_SESSION['logged_in']) ||
          !$_SESSION['logged_in'] ): ?>
<!--   <button id="homelogin" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
   Log in
    </button> -->
      <a href="login.php" role="button" class="btn btn-primary">Login</a>

      <a href="registration.php" role="button" class="btn btn-primary">Sign up</a>

<?php else :?>
<a href="account.php" role="button" class="btn btn-primary" style="background-color: black; color: white;">Account</a>
<a href="view_cart.php" role="button" class="btn btn-primary">Cart</a>


<a href="logout.php" role="button" class="btn btn-primary">Logout</a>

<?php endif; ?>


</nav>
    
</div>
<!-- End of Header and Nav Bar -->



<div class="container" style="margin-top: 15%;">
		<div class="row">
			<h5 class="col-12 mt-4 mb-4 text-center">Edit Account Info</h5>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">

		<form action="edit_confirmation.php" method="POST">

			<div class="form-group row">
				<label for="username" class="col-sm-4 col-form-label text-sm-right">
					Username: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['name']; ?>">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="email" class="col-sm-4 col-form-label text-sm-right">
					Email: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-4">
					<input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
				</div>
			</div> <!-- .form-group -->


			<div class="form-group row">
				<div class="ml-auto col-sm-8">
					<span class="text-danger font-italic">* Required</span>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-4"></div>
				<div class="col-sm-8 mt-2">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->
		</form>
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
