

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

<!-- Registration Form -->


  <div class="container" style="margin-top: 15%; ">
    <div class="row">
      <h5 class="col-12 mt-4 mb-4 text-center">User Registration</h5>
    </div> <!-- .row -->
  </div> <!-- .container -->


<div class="container" style="margin-bottom: 10%;">

    <form action="registration_confirmation.php" method="POST">

      <div class="form-group row">
        <label for="username-id" class="col-sm-4 col-form-label text-sm-right">Username: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="username-id" name="username">
          <small id="username-error" class="invalid-feedback">Username is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <label for="email-id" class="col-sm-4 col-form-label text-sm-right">Email: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email-id" name="email">
          <small id="email-error" class="invalid-feedback">Email is required.</small>
        </div>
      </div> <!-- .form-group --> 

      <div class="form-group row">
        <label for="password-id" class="col-sm-4 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password-id" name="password">
          <small id="password-error" class="invalid-feedback">Password is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="row">
        <div class="ml-auto col-sm-8">
          <span class="text-danger font-italic">* Required</span>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <div class="col-sm-4"></div>
        <div class="col-sm-8 mt-3">
          <button type="submit" class="btn btn-primary">Register</button>
          <a href="index.php" role="button" class="btn btn-light">Cancel</a>
        </div>
      </div> <!-- .form-group -->

      <div class="row">
        <div class="col-sm-8 ml-sm-auto">
          <a href="login.php">Already have an account</a>
        </div>
      </div> <!-- .row -->

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

<script>
  document.querySelector('form').onsubmit = function(){
      if ( document.querySelector('#username-id').value.trim().length == 0 ) {
        document.querySelector('#username-id').classList.add('is-invalid');
      } else {
        document.querySelector('#username-id').classList.remove('is-invalid');
      }

      if ( document.querySelector('#email-id').value.trim().length == 0 ) {
        document.querySelector('#email-id').classList.add('is-invalid');
      } else {
        document.querySelector('#email-id').classList.remove('is-invalid');
      }

      if ( document.querySelector('#password-id').value.trim().length == 0 ) {
        document.querySelector('#password-id').classList.add('is-invalid');
      } else {
        document.querySelector('#password-id').classList.remove('is-invalid');
      }

      return ( !document.querySelectorAll('.is-invalid').length > 0 );
    }



</script>




</body>
</html>