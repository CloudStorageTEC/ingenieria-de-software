<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /pagina');
  }
  require 'database.php';

  if (!empty($_POST['user']) && !empty($_POST['password'] )) {
    $records = $conn->prepare('SELECT id, user, password  FROM users WHERE user = :user ');
    $records->bindParam(':user', $_POST['user']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /pagina/Yo.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Style.css">
</head>
<body> 
    <?php require 'Partials/header.php' ?>
 

     <?php if(!empty($message)): ?>
       <p> <?= $message ?></p>
        <?php endif; ?>

       <h1>Login</h1>
       <span>or <a href="SingUp.php">SingUp</a></span>
     
     
     
       <form action="Login.php"  method="post">
        <input type="text" name="user" placeholder="Enter your user">
       <input type="password" name="password" placeholder="Enter your password">
       <input type="submit" value ="Send">
       
     
     
     
     </form>




    
</body>
</html>