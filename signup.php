<?php
  require 'database.php';

  $message = '';
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()){
      $message = 'Su cuenta se a creado satisfactoriamente';
    }
    else{
      $message = 'Lo sentimos, no se logró completar el registro';
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestión de Tráfico</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
      <?php endif; ?>


    <h3>Registrarse</h3>
    <br/><br/><br/>
    <h4>¿Ya tienes una cuenta? <a href="login.php">INICIAR SESIÓN</a></h4>

    <form class="" action="signup.php" method="post">
      <input type="text" name="email" placeholder="Enter your mail">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="password" name="confirm_password" placeholder="Confirm your password">
      <input type="submit"  value="REGISTRARSE">
  </body>
</html>
