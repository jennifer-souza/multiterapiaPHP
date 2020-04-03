<?php 

	include('classes/conexao.php');
	$id 	= $_GET['id'];
	$sql 	= "DELETE FROM tb_agendamento WHERE id = " . $id;
	mysqli_query($link, $sql);

?>
<script type="text/javascript">location.replace('listaAgendamento.php')</script>