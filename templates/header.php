<?php
$host='localhost';
$dbname = 'accounts';
$user='root'; 
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname; port=3307";

try {
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Database Connection failed: " . $e->getMessage();
    throw new PDOException($e->getMessage());
}
session_start();
  ?>

<!DOCTYPE HTML> 
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Final Assignment</title>
  </head> 
  
  <body>
    <div id="container"> 
      <header id="banner">
        <h1>Final Assignment</h1>
        <h3>Users' Info Using PHP with MySQL</h3> 
      </header>
      
      <div id="nav"> 
        <ul>
          <a href="index.php"><li>Home</li></a>   <!--"ul li a" order changes to "ul a li" for css-->
          <a href="member.php"><li>Member</li></a>
          <a href="contact.php"> <li>Contact</li></a>
          
          <!--Client/Register-->
          <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                                           
                        } else {
                            echo '<a href="register.php"><li>Register</li></a>';
                        }
          ?>

          <!--Logout/Login-->
          <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                        echo '<a href="logout.php"><li>Logout</li></a>';
                    } else {
                        echo '<a href="index.php"><li>Login</li></a>';
                    }
          ?>
        </ul> 
      </div>
    </div>
  </body>
</html>