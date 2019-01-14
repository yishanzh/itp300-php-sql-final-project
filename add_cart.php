<?php


if( !isset($_GET['product_id']) || empty($_GET['product_id']) 
	|| !isset($_GET['user_id']) || empty($_GET['user_id'])
	|| !isset($_GET['product_name']) || empty($_GET['product_name'])
	 ) {
	$error = "Invalid URL.";

} else {
	require 'config.php';

//DB Connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}

$mysqli->set_charset('utf8');



$sql = "INSERT INTO cart (user_id, product_id)
		VALUES ("
		. $_GET['user_id']
		.","
		. $_GET['product_id']
		.");";

// echo "<hr>" . $sql . "<hr>";

$results = $mysqli->query($sql);
if ( !$results ) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
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


<?php if (!isset($_SESSION['logged_in']) ||
          !$_SESSION['logged_in'] ): ?>
<!--   <button id="homelogin" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
   Log in
    </button> -->
      <a href="login.php" role="button" class="btn btn-primary">Login</a>

      <a href="registration.php" role="button" class="btn btn-primary">Sign up</a>

<?php else :?>
<a href="account.php" role="button" class="btn btn-primary">Account</a>
<a href="logout.php" role="button" class="btn btn-primary">Logout</a>

<?php endif; ?>



</nav>
    
</div>
<!-- End of Header and Nav Bar -->



	<div class="container" style="margin: 20%;">

		<div class="row mt-4">
			<div class="col-12">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div><?php echo $_GET['product_name']; ?> was successfully added to shopping cart.</div>
				<?php endif; ?>
		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="view_cart.php?product_id=<?php echo $_GET['product_id']?>&product_name=<?php echo $_GET['product_name']?>&user_id=<?php echo $_SESSION['user_id']; ?>"  role="button" class="btn btn-primary">View Shopping Cart</a>

		</div> <!-- .col -->
	</div> <!-- .row -->

</div> <!-- .container -->



</body>

</html>










