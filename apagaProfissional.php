<?php 

	include('classes/conexao.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM tb_profissional WHERE id_profissional = " . $id;
	mysqli_query($link, $sql);

?>
<script type="text/javascript">location.replace('listaProfissional.php')</script>