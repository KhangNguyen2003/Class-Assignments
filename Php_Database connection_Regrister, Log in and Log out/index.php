<?php
 require_once("templates/header.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $email = $_POST['email'];
  $password = $_POST['password'];


  if(empty($email)|| empty($password)){
    $empty_message="<p class=\"error\" Email and Password is required>";
  }
  else{

    $sql="SELECT email FROM users WHERE email=:email AND password=:password";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['email'=>$email, 'password' => $password]);
    $count = $stmt->rowCount();
    echo $count;

    if($count){
      $_SESSION['email']=$email;
      $_SESSION['password']=$password;
      header("Location: member.php");
      echo"Log in completed";
      exit();

      
    }
    else{
      echo "failed";
    }
  }
}  
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Home</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
  
<body>
<div class="container">
<h1>Welcome! Login</h1>
<h3>Please log in if you are already one of our members: </h3>
        <div class="Registration">
        
        <form method="post" action="index.php">     
              <label class="label" for="email">Email: <br></label>
              <input type="email" placeholder="abc@email.com" name="email" id="email" required>        
              <label class="label" for="password">Password</label>
              <input type="text" name="password" id="password" required>
            <div class="button">
              <button class="submit">LOG IN</button>
           </div>
           <div class="button">
          <button type="reset">CLEAR</button> </div>
          </form>
        </div>
</div>
</body>
</html>

<?php
require'templates/footer.php';
?>
