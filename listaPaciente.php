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
				<h2>Lista de Profissionais</h2>
			<hr>
			<table class="table table-bordered">
			    <tr>
			      <td colspan="2">Nome</td>
			      <td colspan="2">CPF</td>
			      <td colspan="2">RG</td>
			      <td colspan="2">Data de Nascimento</td>
			      <td colspan="2">Profissional</td>
			      <td colspan="2">Logadouro</td>
			      <td colspan="2">Nº</td>
			      <td colspan="2">Bairro</td>
			      <td colspan="2">Cidade</td>
			      <td colspan="2">CEP</td>
			      <td colspan="2">UF</td>
			      <td colspan="2">Telefone</td>
			      <td colspan="2">Celular</td>
			      <td colspan="2">Email</td>
			      <td colspan="2">Data de Cadastro</td>
			      <td colspan="2"></td>
			      <td colspan="2"></td>
			    </tr>
				<?php 
				while($linhaTabela = mysqli_fetch_array($result)){
				?>
				<tr>
					<td colspan="2"><?php echo ($linhaTabela[1])?></td>
					<td colspan="2"><?php echo ($linhaTabela[2])?></td>
					<td colspan="2"><?php echo ($linhaTabela[3])?></td>
					<td colspan="2"><?php echo ($linhaTabela[4])?></td>
					<td colspan="2"><?php echo ($linhaTabela[5])?></td>
					<td colspan="2"><?php echo ($linhaTabela[6])?></td>
					<td colspan="2"><?php echo ($linhaTabela[7])?></td>
					<td colspan="2"><?php echo ($linhaTabela[8])?></td>
					<td colspan="2"><?php echo ($linhaTabela[9])?></td>
					<td colspan="2"><?php echo ($linhaTabela[10])?></td>
					<td colspan="2"><?php echo ($linhaTabela[11])?></td>
					<td colspan="2"><?php echo ($linhaTabela[12])?></td>
					<td colspan="2"><?php echo ($linhaTabela[13])?></td>
					<td colspan="2"><?php echo ($linhaTabela[14])?></td>
					<td><a href="alteraPaciente.php?id=<?php echo($linhaTabela[0]) ?> ">Alterar</a></td>
					<td><a href="apagaPaciente.php?id=<?php echo($linhaTabela[0]) ?> ">Apagar</a></td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>
	</body>
</html>