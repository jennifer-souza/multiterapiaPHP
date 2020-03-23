<?php 
	include('classes/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
	<body>
		<?php include('header.html'); ?>
		<?php
			$sql = "SELECT * FROM tb_paciente";
			$result = mysqli_query($link, $sql);
		?>
		<div class="prof">
			<hr>	
				<h2>Lista de Pacientes</h2>
			<hr>
			<table class="table table-bordered">
			    <tr>
			      <td colspan="2">Nome</td>
			      <td colspan="2">CPF</td>
			      <td colspan="2">RG</td>
			      <td colspan="2">Data de Nascimento</td>
			      <td colspan="2">Telefone</td>
			      <td colspan="2">Celular</td>
			      <td colspan="2">Email</td>
			      <td colspan="2">Data de Cadastro</td>
			      <td colspan="2"></td>
			      <td colspan="2"></td>
			    </tr>
				<?php while($linhaTabela = mysqli_fetch_array($result)){ ?>
					<tr>
						<td colspan="2"><?php echo ($linhaTabela[1])?></td>
						<td colspan="2"><?php echo ($linhaTabela[2])?></td>
						<td colspan="2"><?php echo ($linhaTabela[3])?></td>
						<td colspan="2"><?php echo ($linhaTabela[4])?></td>
						<td colspan="2"><?php echo ($linhaTabela[12])?></td>
						<td colspan="2"><?php echo ($linhaTabela[13])?></td>
						<td colspan="2"><?php echo ($linhaTabela[14])?></td>
						<td colspan="2"><?php echo ($linhaTabela[15])?></td>
						<td><a href="alteraPaciente.php?id=<?php echo($linhaTabela[0]) ?> ">Alterar</a></td>
						<td><a href="apagaPaciente.php?id=<?php echo($linhaTabela[0]) ?> ">Apagar</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>