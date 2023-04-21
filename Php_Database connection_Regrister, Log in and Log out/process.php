<?php
// Insert user input into database
$stmt = $pdo->prepare($sql);
$isInserted = $stmt->execute([
    ':fname' => $fname,
    ':lname' => $lname,
    ':email' => $email,
    ':password' => $password
]);

if ($isInserted) {
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    header("Location: member.php");
    exit();
} else {
    $pEmpty = "<p class=\"error\">Sorry! Registration failed.</p>";
}
