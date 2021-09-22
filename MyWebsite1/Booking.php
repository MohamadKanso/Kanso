<!DOCTYPE html>
<html>
<head>
<?php
session_start();
require_once "connectdb.php";
$conn = new mysqli( 'smcse-stuproj00.city.ac.uk','adbt261' , '200007917', 'adbt261');
$query = "SELECT * FROM adbt261_appoitments";

$current_user = $_SESSION["user"];

$cards = $_POST['dates'];


   $pieces = explode(" ", $cards);
    $var= True;


    if ($result = $db->query($query)) {
      // echo intval($row['id']);
      while ($row = $result->fetch_assoc()) {

       if($row['taken']==0){
         if($row['location2']==$pieces[0]." "){ 
         $val = intval($row['id']);
         $sql = "INSERT INTO adbt261_user_appoitments (username,location1,date1) VALUES ('$current_user','$pieces[0]','$pieces[1]')";
        if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "UPDATE adbt261_appoitments SET taken= 1 WHERE id= $val";

if ($conn->query($sql2) === TRUE) {
echo "New updated created successfully";
} else {
echo "Error: " . $sql2 . "<br>" . $conn->error;
}
         
      }
    

       }
   
      }
    }
?>
  
  <div style="padding-right:16px">
  </div>

<title>Booking</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="style2.css" rel="stylesheet">
</head>
<body>
  
	<div class="topnav">
		<img class="logo" src="logo.JPG" alt="Logo" width="130" height="53">
		<a href="index.html">Home</a>
		<a  href="About Us.html">About</a>
		<a href="Contact.php">Contact</a>
    <a class="active" href="Booking.php">Booking</a>
    <a href="Booking.php">Welcome <?php print_r($_SESSION["user"]); ?>!</a>
	  </div>

	<div class="col-md-8 sep">
			<h1 class="welcome">Booking</h1>
                    <p>To view the cars book an appointment below:</p>
                     <form method="post">
                     <label>Choose an appointment:</label>
                     <select name="dates">

                       <?php
                     if ($result = $db->query($query)) {

                      while ($row = $result->fetch_assoc()) { ?>
                    
                        <option value="<?php echo($row['location2'] ."" .$row['date']);?>" style='color: <?php if($row['taken'] == 1){
                        print_r('red');
                        } else
                        {echo('blue');
                        }  ?>  '> <?php echo("Location:". $row['location2'] ." At:" .$row['date']); ?> </option> 
                        <?php                                     }
                      }
                    ?>
                    
                      </select>
                     <p > <span style='color:red'> Red: Taken </span> <br> <span style='color:blue'> Blue: Available </span> </p>
                      <br><br>

                      <input type="submit" value="Submit" NAME="press" id="butt">

                      <?php
                      $query2 = "SELECT * FROM adbt261_user_appoitments WHERE username='$current_user'";
                      ?>  <h2> My Appoitments: </h2> <?php
                        if ($result = $db->query($query2)) {
                          while ($row = $result->fetch_assoc()) {
                            ?> 
                                  <p> <?php echo 'Appoitment at: ' . $row['location1']. '. Date: '. $row['date1']; ?> </p> <?php
                }

}
                      ?>
                   
</form>
                     

                
	 </div>
   <div class="slideshow-container">
  
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="image1.jfif" style="width:  %">
      <div class="text">Clean energy</div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="image2.jfif" style="width:100%">
      <div class="text">Charge at home </div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="image3.jfif" style="width:100%">
      <div class="text">Optimal Speed</div>
    </div>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>
    <p>https://www.w3schools.com/howto/howto_js_slideshow.asp</p>
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