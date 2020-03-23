<?php
session_start();

  if(!$_SESSION['email_usuario'] && !$_SESSION['senha_usuario']){
      header ("location: http://localhost/MultiterapiaPHP/index.php");
  }
  // Finalização de sessão de usuário
  if($_GET['sair'] != ""){
      session_destroy();
      header("location: http://localhost/MultiterapiaPHP/index.php");
  }
?>    

<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
  <body>
    <?php include('header.html'); ?>
  </body>
</html>