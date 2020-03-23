<?php
  session_start();
  if(!isset($_SESSION['id_usuario']))
  {
    header("location: index.php");
    exit;
  }
?>   
<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
<body>
  <?php include('header.html'); ?>
  <form action="home.php" class="prof" method="POST"></form>  
</body>
</html>