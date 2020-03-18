<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
?>

	}
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Multiterapia</title>
    <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Cadastros</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Consultas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Agendamentos</a>
    </li>
  </ul>
  <div></div>
  <nav>
  <ul class="navbar-nav">
    <li> </li>
    <li> </li>
    <li> </li>
    <li class="nav-item">
      <a class="nav-link" href="sair.php"><strong>Sair</strong></a>
    </li>
  </ul>
  </nav>

</nav>
<br>

</body>
</html>