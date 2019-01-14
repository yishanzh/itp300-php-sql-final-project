<?php

require 'config.php';

//DB Connection 

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}

$mysqli->set_charset('utf8');

//Sub Category Filter
$sql_filter = "SELECT * FROM subcategory;";
$results_filter = $mysqli->query($sql_filter);
if ($results_filter == false) {
  echo $mysqli->error;
  exit();
}

//display results
$sql = "SELECT product.product_id, product.name, subcategory.subcat_name AS subcategory, product.price, product.img_path
      FROM product
      LEFT JOIN subcategory
        ON subcategory.subcat_id = product.subcat_id
        WHERE 1=1";

if (isset($_GET['product_name']) && !empty($_GET['product_name']) ){
  $sql = $sql . " AND product.name LIKE '%" . $_GET['product_name'] . "%'";
}
if ( isset($_GET['sub']) && !empty($_GET['sub']) ) {
  $sql = $sql . " AND product.subcat_id = " . $_GET['sub'];
}

$sql = $sql . ";";

$results = $mysqli->query($sql);

if ($results == false ) {
  echo $mysqli->error;
  exit();
}


// Close DB Connection
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
        <a class="nav-link" href="index.php">Home</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="clothings.php">Clothing  <span class="sr-only">(current)</span></a>
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
<a href="view_cart.php" role="button" class="btn btn-primary">Cart</a>

<a href="logout.php" role="button" class="btn btn-primary">Logout</a>

<?php endif; ?>


</nav>
    
</div>
<!-- End of Header and Nav Bar -->





<!-- Filter -->
<div id="filter" class="container">

<form action="clothings_results.php?" method="GET">

  <div class="form-group row">

  <label for="name-id" class="col-sm-2 col-form-label text-sm-left">Key Words:</label>

  <div class="col-sm-3">
    <input type="text" class="form-control" id="name-id" name="product_name">
  </div>

 <label for="sub-id" class="col-sm-2 col-form-label text-sm-left">Type:</label>

 <div class="col-sm-3">
  <select name="sub" id="sub-id" class="form-control">
    <option value="" selected>-- All --</option>

    <?php while ( $row = $results_filter->fetch_assoc() ): ?>
      <option value="<?php echo $row['subcat_id']; ?>">
        <?php echo $row['subcat_name']; ?>
      </option>
    <?php endwhile; ?>
  </select>
</div>

  <button type="submit" class="col-sm-2 btn btn-light">Search</button>

  </div> 
  <!-- .form-group -->
</form>
</div>
<!-- container -->


<!-- End of Filter -->

<!-- Product Display Section -->

<div id="product">


    <p class="text-center">配 饰 | A C C E S S O R I E S</p>


  <div class="row" style="margin: 5%;" >


   <?php
   $index = 0;
   while( $row = $results->fetch_assoc() ):
   ?>

  <div class="item col-sm-4">
          <img src=<?php echo $row['img_path']; ?>>
          <div class="name"><?php echo $row['name']; ?></div>
          <div class="price">$<?php echo $row['price']; ?></div>
<!-- show add to cart button if user is logged in -->


    <?php if (isset( $_SESSION['logged_in']) && $_SESSION['logged_in'] == true ): ?>
          <a href="add_cart.php?product_id=<?php echo $row['product_id']?>&product_name=<?php echo $row['name']?>&user_id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary" style="margin-bottom: 8%;">Add to Cart</a>
    <?php endif; ?>
  </div>

  <?php endwhile; ?>

</div>


<!-- End of Product Display Section -->



    <div class="row mt-4 mb-4">
<div class="col-12">
        <a href="accessories.php" role="button" class="btn btn-light">Back to All Accessories</a>
      </div> <!-- .col -->
</div>


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