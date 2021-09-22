  <!DOCTYPE html>
  <html>
  <head>
  <?php
  // include connection settings
  require_once "connectdb.php";
  // select details for all students
  $conn = new mysqli( 'smcse-stuproj00.city.ac.uk','adbt261' , '200007917', 'adbt261');

  
  $username1 = $_POST['username'];
  $firstname1 = $_POST['firstname'];
  $lastname1 = $_POST['lastname'];
  $phone1 = $_POST['phone'];
  $email1 = $_POST['email'];
  $password1 = $_POST['password'];
  $confirm1 = $_POST['confirm'];
  $query = "SELECT * FROM adbt261_users";

  if($password1 == $confirm1 AND $username1!="" AND $firstname1!="" AND $lastname1!="" AND $phone1!="" AND $email1!="" AND $password1!="" AND $confirm1!=""){
    $sql = "INSERT INTO adbt261_users (username,firstName,lastName,phone,email,password1) VALUES ('$username1','$firstname1','$lastname1','$phone1','$email1','$password1')";
    
    if (mysqli_query($conn, $sql)) {
      ?> <p style='color:green'> New record created successfully</p>
      <?php
    } else { ?>
      <p style='color:red'> Error! User can't be created</p><?php
    }
  
  

  }

  ?>

    
    <div style="padding-right:16px">
    </div>

  <title>Create an account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="style3.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="topnav">
      <img class="logo" src="logo.JPG" alt="Logo" width="130" height="53">
      <a href="index.html">Home</a>
      <a href="About Us.html">About</a>
      <a class="active"href="Contact.php">Contact</a>
      </div>

    <div class="col-md-8 sep">
        <h2 class="welcome">Create an account</h2>
          
              <p class="about">Visit our About Us page to find out more about Ecar. If you would like ot learn more about our products visit our Support page which will be available in the next few weeks.</p>
          <p class="about"> To contact us on email use the following address;<a href="mailto:Contact@Ecar.com"> Contact@Ecar.com</a></p>
                  <p class="about">Ecars physically address is: 22 Homestead Lane, Welwyn Garden City",AL7 4LU</p>
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
              <label for="inputEmail4">Username</label>
              <input class="form-control" id="inputUsername" placeholder="Username" NAME = "username">
            </div>
            <div class="form-group">
              <label for="inputAddress">First name</label>
              <input type="text" class="form-control" id="inputFirstname" placeholder="First name" NAME = "firstname">
            </div>
            <div class="form-group">
              <label for="inputAddress">Last name</label>
              <input type="text" class="form-control" id="inputLastname" placeholder="Last name" NAME = "lastname">
            </div>
            <div class="form-group">
              <label for="inputAddress">Phone</label>
              <input type="integer" class="form-control" id="inputPhone" placeholder="0000 0000" NAME = "phone">
            </div>
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email" NAME = "email">
            </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" NAME = "password">
          </div>
          <div class="form-group">
              <label>Confirm password</label>
              <input type="password"class="form-control" id="inputConfirmpassword" placeholder="Confirm password" NAME = "confirm">
              
            </div>
            
          </div>
          <button type="submit" class="btn btn-primary">Create Account</button>
          
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