<?php
// if( !isset($_GET['product_id']) || empty($_GET['product_id']) 
// 	|| !isset($_GET['user_id']) || empty($_GET['user_id'])
// 	|| !isset($_GET['product_name']) || empty($_GET['product_name'])
// 	 ) {
// 	$error = "Invalid URL.";

// } else {

	require 'config.php';

  if( !isset($_SESSION['user_id']) || empty($_SESSION['user_id']) ) {
  header('Location: index.php');
} else {
	//DB Connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}

$mysqli->set_charset('utf8');


$sql = "SELECT cart.cart_id, cart.product_id, cart.user_id, product.name, product.product_id, product.img_path, product.price 
		FROM cart 
		LEFT JOIN product
		ON cart.product_id = product.product_id
		WHERE cart.user_id = " . $_SESSION['user_id'] . ";";

$results = $mysqli->query($sql);

if (!$results) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Cart</title>
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



<!-- Shopping Cart Display Section -->

<div id="product" style="margin-top: 15%; width: 80%; margin-left: auto; margin-right: auto;">

 <?php if ( $results->num_rows == 0 ) : ?>
  <div class="mb-5">Cart is empty.</div>
<?php else : ?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Delete Item</th>
    </tr>
  </thead>

  <tbody>
  	<?php while ( $row = $results->fetch_assoc() ) : ?>
    <tr>
      <th scope="row"><?php echo $row['product_id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['price']; ?></td>

      <td><img style="width: 150px;" src=<?php echo $row['img_path']; ?>></td>
      <td>
      	<!-- delete button  -->
      	         <a href="delete_from_cart.php?cart_id=<?php echo $row['cart_id']?>&product_name=<?php echo $row['name'] ?>" class="btn btn-primary">Delete from Cart</a>
      </td>
    </tr>
   <?php endwhile; ?>
  </tbody>
</table>

<?php endif; ?>

</div>
<!-- End of Shopping Cart Display Section -->




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












