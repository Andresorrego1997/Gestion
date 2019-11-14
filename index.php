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
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestión de Tráfico</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <h1>Please Login or SignUp</h1>
    <h2 class="sentence">Podras ver
       <div class="slidingHorizontal">
         <span>Incidentes en la via.</span>
         <span>Vías monitoreadas.</span>
         <span>Cámaras en la via.</span>
         <span>Tu ruta de viaje.</span>
       </div>
     </h2>

    <?php if(!empty($user)): ?>
      <a href="pagina.html"></a>
      <a href="logout.php">CERRAR SESIÓN</a>
      <?php
  header('Location: pagina.html');
  ?>
    <?php else: ?>

      <a id="login"href="login.php">INGRESAR</a>
      <a id="signup"href="signup.php">REGISTRARSE</a>
    <?php endif; ?>

  </body>
</html>
