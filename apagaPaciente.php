<?php 

	include('classes/conexao.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM tb_paciente WHERE id_paciente = " . $id;
	mysqli_query($link, $sql);

?>
<script type="text/javascript">location.replace('listaPaciente.php')</script>