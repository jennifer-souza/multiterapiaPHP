<?php 
	include('classes/conexao.php');
?>

<html>
<?php include('head.html'); ?>
	<body>
		<?php include('head.html'); ?>
		<?php
			$sql = "SELECT * FROM tb_profissional";
			$result = mysqli_query($link, $sql);
		?>
	<h2>Lista de profissionais</h2>
	<table border="1">
	<tr>
		<td>Nome</td>
		<td>Área</td>
		<td>Licença profissional</td>
		<td>CPF</td>
		<td>RG</td>
		<td>Email</td>
		<td>Celular</td>
		<td>Data de Cadastro</td>
		<td></td>
		<td></td>
	</tr>
	<?php 
	while($linhaTabela = mysqli_fetch_array($result)){
	?>
		<tr>
			<td><?php echo ($linhaTabela[1])?></td>
			<td><?php echo ($linhaTabela[7])?></td>
			<td><?php echo ($linhaTabela[2])?></td>
			<td><?php echo ($linhaTabela[3])?></td>
			<td><?php echo ($linhaTabela[4])?></td>
			<td><?php echo ($linhaTabela[5])?></td>
			<td><?php echo ($linhaTabela[6])?></td>
			<td><?php echo ($linhaTabela[8])?></td>
			<td><a href="alteraProfissional.php?id=<?php echo($linhaTabela[0]) ?> ">Alterar</a></td>
			<td><a href="apagaProfissional.php?id=<?php echo($linhaTabela[0]) ?> ">Apagar</a></td>
		</tr>
	<?php	
	}
	?>
</table>

	</body>
</html>