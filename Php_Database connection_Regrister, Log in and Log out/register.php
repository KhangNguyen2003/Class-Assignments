<?php
require_once("templates/header.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $user_password = $_POST['password'];

// check if input fields are empty:
if (empty($fname)||empty($lname)||empty($email)||empty($user_password)){
    $pEmpty = "<p class=\"error\"First name, last name, email, and password are required</p>";
}
  // check if the email is in correct format
else{
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
       
        $stmt->execute(['email'=>$email]);
// check if email has already existed

        if ($stmt->rowCount() == 1) {
            $pEmpty = "<p class=\"error\"Your email has already exist. Please use another one! </p>";
        } 
        else {
         //insert data  
        $sql = "INSERT INTO users(email,password,first_name,last_name) VALUES (:email,:password,:fname,:lname)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email, 'password' => $user_password, 'fname' => $fname, 'lname' => $lname]);
        

        if ($stmt->rowCount() == 1) {
          // Redirect user to the member page
          $_SESSION['email'] = $email;
          $_SESSION['fname'] = $fname;
          $_SESSION['lname'] = $lname;
          header("Location: member.php");
          exit();
        }
        else{
                  echo"failed";
               
              }
            }
          }
        }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Register</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
  
<body>
<div class="container">
<h1>Welcome! Sign Up Now!</h1>
<h3>Please fill out the following form </h3>

<div class="Registration" >
    
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
 
            <label class="label" for="fname">First Name:<br></label>
            <input type="text" placeholder="First name" id="fname" name="fname" >
   
            <label class="label" for="lname">Last Name: </label>
            <input type="text" placeholder="Last name" id="lname" name="lname" >
         
          
            <label class="label" for="email">Email: <br></label>
            <input type="email" placeholder="abc@email.com" name="email" id="email" >
        
            <label class="label" for="password">Password</label>
            <input type="password" name="password" id="password" >
          <br>
          <div class="button">
            <button class="submit">REGISTER</button>
          </div>
          <div class="button">
          <button type="reset">CLEAR</button> </div>
          
</form>
</div>
</div>


<?php
require_once("templates/footer.php");
?>