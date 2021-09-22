<html>
 <head>
 <title>ECAR</title>
 </head>
 <body>
 <?php
 $db = new mysqli('smcse-stuproj00.city.ac.uk', 'adbt261', '200007917', 'adbt261');
 if ($db->connect_errno) {
 printf("Connection failed: %s\n", $db->connect_error);
 exit();
 } else {
 echo "Database connected successfully!";
 }
 ?>
 </body>
</html> 