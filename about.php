<?php

require 'config.php';

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
	<link rel="stylesheet" type="text/css" href="css/about.css">

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
       <li class="nav-item active">
        <a class="nav-link" href="about.php">About  <span class="sr-only">(current)</span></a>
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
<a href="view_cart.php" role="button" class="btn btn-primary">Cart</a>

<a href="logout.php" role="button" class="btn btn-primary">Logout</a>

<?php endif; ?>


</nav>
    
</div>
<!-- End of Header and Nav Bar -->





<!-- studio gallery  -->
<div id="gallery">
	<p class="text-center">关于 | M I S S I O N</p>

		<div id="mask">

			<p>Hi! I am Susan, the creator of this website. </p>
			<p>私服 in Chinese means personal wardrobe. Concerned about the impact that fashion places on the ecosystem, I aim to reduce carbon footprint from fashion industry. I used to shop a lot because I am a huge fan of fashion and I stopped wearing some clothes I bought previously when I think it is not trendy anymore. Susan’s Wardrobe mainly sells high quality second-hand clothes, shoes, and accessories. Think about it as a fashion exchange platform. </p>
			<p>If you want to donate your old clothes, you can contact me at susanio330@gmail.com. I buy back high-quality clothes that you do not want anymore too!</p>
		</div>

	<div id="main-img-container">
		<img id="main-img" src="img/about1.jpg" alt="">
	</div>


		<div id="thumbnail-wrapper">
					<div class="thumbnail" id="thumbnail1">
						<img src="img/about1.jpg" alt="">
					</div>

					<div class="thumbnail" id="thumbnail2">
						<img src="img/about2.jpg" alt="">
					</div>

					<div class="thumbnail" id="thumbnail3">
						<img src="img/about3.jpg" alt="">
					</div>

					<div class="thumbnail" id="thumbnail4">
						<img src="img/about4.jpg" alt="">
					</div>

					<div class='clearfloat'></div>

		</div> <!-- #thumbnail-wrapper -->

</div>
<!-- end of studio gallery -->


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
		document.querySelector("#thumbnail1").onclick = function () {
			document.querySelector("#main-img").src = "img/about1.jpg";
		}


		document.querySelector("#thumbnail2").onclick = function () {
			document.querySelector("#main-img").src = "img/about2.jpg";
		}


		document.querySelector("#thumbnail3").onclick = function () {
			document.querySelector("#main-img").src = "img/about3.jpg";
		}


		document.querySelector("#thumbnail4").onclick = function () {
			document.querySelector("#main-img").src = "img/about4.jpg";
		}




</script>
</body>
</html>