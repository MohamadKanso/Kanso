<html>
  <head>
<?php
session_start();
// include connection settings
require_once "connectdb.php";
// select details for all students
$query = "SELECT * FROM adbt261_users";
$password1 = $_POST['password'];
$username1 = $_POST['username'];

$query2 = "SELECT * FROM adbt261_users WHERE username='$username1'";

// perform the query
if ($result = $db->query($query)) {
 // loop through and print out the results


 while ($row = $result->fetch_assoc()) {
   if($username1 == $row['username']){
    if ($result = $db->query($query2)) {

      while ($row = $result->fetch_assoc()) {
        if($password1 == $row['password1']){
          print_r("password correct");
          $_SESSION["user"] = $username1;
          header('Location: https://smcse.city.ac.uk/student/adbt261/Booking.php');

        }
      }
    }
   }
 }
// if there was an error with your query, this will display it
}
 else {
 echo "SQL Error: " . $db->error;
}



?>

  <div style="padding-right:16px">
  </div>

<title>Contact Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="style3.css" rel="stylesheet">
</head>
<body>
  
	<div class="topnav">
		<img class="logo" src="logo.JPG" alt="Logo" width="130" height="53">
		<a href="index.html">Home</a>
		<a href="About Us.html">About</a>
		<a href="Contact.php"class="active">Contact</a>
	  </div>

	<div class="col-md-8 sep">
			<h2 class="welcome">Contact</h2>
				
            <p class="about">Visit our About Us page to find out more about Ecar. If you would like ot learn more about our products visit our Support page which will be available in the next few weeks.</p>
            <p class="about"> To contact us on email use the following address;<a href="mailto:Contact@Ecar.com"> Contact@Ecar.com</a></p>
                <p class="about">Ecars physically address is: 22 Homestead Lane, Welwyn Garden City,AL7 4LU</p>
                <p class="about">If you would like to phone Ecar: <a href="tel:+1 832-278-2836">832-278-2836</a></p>
                <p class="about">Opening hours: </p>
                <p class="about">Monday- 10.30am to 4pm </p>
                <p class="about">Tuesday- 10.30am to 4pm </p>
                <p class="about">Wednesday- 10.30am to 4pm </p>
                <p class="about">Thursday- 10.30am to 4pm </p>
                <p class="about">Friday - 10.30am to 4pm </p>
                <p class="about">Saturday- 10.30am to 4pm </p>
                <p class="about">Sunday - Closed </p>
	 </div>

    <form class="col-md-8 sep" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Username</label>
            <input class="form-control" id="inputUsername" placeholder="Username" NAME = "username">
          </div>
        <div class="form-group">
          <label>Password</label>
          <input  type="password" class="form-control" id="inputPassword4" placeholder="Password" NAME = "password">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
         <a href="CreateAccount.php" button type="button" class="btn btn-primary" > Create an account</a>
      </form>
    <script>
      var slideIndex = 0;
      showSlides();
      
      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3500); // Change image every 2 seconds
      }
      </script>

     <img src="electric friendly.png" alt="electric friendly" width="100" height="45">
</body>
<footer>
	<h6 class="copyright">Copyright © 2020 Ecar</h6> 
	<h6>Follow us on Social Media
    <h6 style="float: left; clear: left"><img src="facebook.png" height="16px" width="16px" ></h6>
    <h6 >Facebook https://www.facebook.com/Ecar</h6>
    <h6 style="float: left; clear: left"><img src="instagram.png" height="16px" width="16px" ></h6>
    <h6>Instagram https://www.instagram.com/Ecar</h6>
    <h6 style="float: left; clear: left"><img src="twitter.png" height="16px" width="16px" ></h6>
    <h6>Twitter https://twitter.com/Ecar</h6>
    <h6>DISCLAIMER:</h6>
    <h6 class="disclaimer">Ecar is a fictitious brand created solely for the purpose of the
    assessment of IN1010 module at City, University of London, UK. All products and
    people associated with Ecar are also fictitious. Any resemblance to real
    brands, products, or people is purely coincidental. Information provided about the
    product is also fictitious and should not be construed to be representative of actual
    products on the market in a similar product category</h6>
</footer>

</html>