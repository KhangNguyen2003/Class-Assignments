<?php
 # When submiting, Check if the fullname is present, Collect details from form and sent email  
 #if($_POST["fname"]){
   #echo $_POST['email']; echo $_POST['message']  # The lines is for testing purposes
   if(isset($_POST['email']))
     mail($_POST['email'], "New Email!", $_POST['message']);
   # echo "email sent!";                          # The line is for testing purposes
#}
?>

<!--The page name is "Contact Us"-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Contact us</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
  
<body>
  <?php require 'templates/header.php';?>
  
  <div class="container">
    <form method="post" action="contact.php" id="form" name="form">

      <label for="fname">Fullname :</label>
      <input type="text" id="fname" name="fname" placeholder="Smith ABC">

      <label for="email">Email :</label>
      <input type="text" id="email" name="email" placeholder="abc@example.com">

      <label for="message">Message :</label>
      <textarea id="message" name="message" placeholder="Write something.." style="height:100px"></textarea>

      <input type="submit" value="Submit">     
    </form>
  </div>

</body>

<?php include 'templates/footer.php';?>

</html>

