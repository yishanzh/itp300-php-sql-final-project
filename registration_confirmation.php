<?php

require 'config.php';

if ( !isset($_POST['email']) || empty($_POST['email'])
  || !isset($_POST['username']) || empty($_POST['username'])
  || !isset($_POST['password']) || empty($_POST['password']) ) {
  $error = "Please fill out all required fields.";
} else {
    // All required fields provided.
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ( $mysqli->connect_errno ) {
      echo $mysqli->connect_error;
      exit();
    }

    $sql_registered = "SELECT *
                          FROM user
                          WHERE name = '" . $_POST['username'] . "' OR email = '" . $_POST['email'] . "';";

    $results_registered = $mysqli->query($sql_registered);

    if ( !$results_registered ) {
      echo $mysqli->error;
      exit();
    }

    if ( $results_registered->num_rows > 0 ) {
      //username or email already registered.
      $error = "Username or email already taken.";
    } else {
      //usernameand email available.

      $password = hash('sha256', $_POST['password']);

      $sql = "INSERT INTO user (name, email, password)
              VALUES ('"
                . $_POST['username']
                . "','"
                . $_POST['email']
                . "','"
                . $password
                . "');";
      $results = $mysqli->query($sql);
      if (!$results) {
        echo $mysqli->error;
        exit();
      }
    }


    $to = $_POST['email'];
    $subject = "Registration Successful";
    $message = "<h1>Welcome, " . $_POST['username'] . "!</h1>
                Your account was successfully created.";
    $headers = "Content-Type: text/html"
              . "\r\n"
              . "From: no-reply@susanwardrobe.com"
              . "\r\n"
              . "Reply-To: support@susanwardrobe.com";

    if ( !mail($to, $subject, $message, $headers) ) {
      $error = "Account created. There was an error sending the email.";
    }

    $mysqli->close();

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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

</nav>
    
</div>
<!-- End of Header and Nav Bar -->


<!-- registration confirmation -->


<div class="container" style="margin-top: 15%;">
    <div class="row">
      <h5 class="col-12 mt-4 text-center">User Registration</h5>
    </div> <!-- .row -->
  </div> <!-- .container -->

  <div class="container">

    <div class="row mt-4">
      <div class="col-12 text-center">
        <?php if ( isset($error) && !empty($error) ) : ?>
          <div class="text-danger"><?php echo $error; ?></div>
        <?php else : ?>
          <div class="text-success"><?php echo $_POST['username']; ?> was successfully registered.</div>
        <?php endif; ?>
    </div> <!-- .col -->
  </div> <!-- .row -->

  <div class="row mt-4 mb-4">
    <div class="col-12 text-center">
      <a href="login.php" role="button" class="btn btn-primary">Login</a>

      <!-- check the link below! -->
      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>



    </div> <!-- .col -->
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

<script>
  



</script>




</body>
</html>