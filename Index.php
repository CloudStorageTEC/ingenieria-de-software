<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cloud Storage</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Style.css">

</head>
<body>
        
    <?php require 'Partials/header.php' ?>
    
    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php"> Logout</a>
    <?php else: ?>

    <h1>Please Login or SignUp</h1>
    <a href="Login.php">Login</a> or
    <a href="SingUp.php">SingUp</a>
 
    <?php endif; ?>
</body>
</html>