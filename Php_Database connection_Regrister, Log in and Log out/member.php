<?php
require 'templates/header.php';
//check if email and password submitted and matches records
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    
    $sql = "SELECT first_name, last_name FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute(['email'=>$email,'password'=>$password]);
    
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch();
        $fname = $row['first_name'];
        $lname = $row['last_name'];
    } else {
        header("location: index.php");
        exit();
    }
} 
else {
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Member</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<h1> Member Page</h1>
<h3>The following is your account information:</h3>
<p>Name: <?php echo $fname.' '.$lname; ?></p>
<p>Email: <?php echo $email; ?></p>



<?php
require'templates/footer.php';
?>