<?php
 require 'database.php';
 $message = '';
 if (!empty($_POST['name']) && !empty($_POST['email'] )) {
  if (!empty($_POST['user']) && !empty($_POST['password'] )) {
    
    $sql = "INSERT INTO users (name, last_name, phone_number, email, user, password, age, sex, direction) VALUES (:name, :last_name, :phone_number, :email, :user, :password, :age, :sex, :direction)";
  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':phone_number', $_POST['phone_number']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':user', $_POST['user']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':age', $_POST['age']);
    $stmt->bindParam(':sex', $_POST['sex']);
    $stmt->bindParam(':direction', $_POST['direction']);


    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'existing user';
    }
  }
}
  

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SingUp</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Style.css">
</head>
<body> 
    <?php require 'Partials/header.php' ?>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>





      <h1>SingUp</h1>
      <span>or <a href="Login.php">Login</a></span>

      <form action="SingUp.php"  method="post">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="text" name="last_name" placeholder="Enter your last name">
        <input type="tel" name="phone_number" placeholder="Enter your phone number">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="text" name="user" placeholder="Enter your user">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="number" name="age" placeholder="Enter your age">
        <input type="text" name="sex" placeholder="Enter your sex. man or woman">
        <input type="text" name="direction" placeholder="Enter your direction">
       <input type="submit" value ="Send">
       




      </form> 
     


</body>
</html>