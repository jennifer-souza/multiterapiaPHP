<?php 
	include('classes/conexao.php');
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
		<?php
			$sql = "SELECT * FROM tb_paciente";
			$result = mysqli_query($link, $sql);
		?>
		<div class="prof">
			<h2 class="border border-secondary rounded bg-secondary text-white">Lista de Pacientes</h2>
			<hr />
			<table class="table table-hover table-sm border border-secondary">
			    <tr>
			      <td colspan="2" class="table-dark">Nome</td>
			      <td colspan="2" class="table-dark">CPF</td>
			      <td colspan="2" class="table-dark">RG</td>
			      <td colspan="2" class="table-dark">Data de Nascimento</td>
			      <td colspan="2" class="table-dark">Telefone</td>
			      <td colspan="2" class="table-dark">Celular</td>
			      <td colspan="2" class="table-dark">Email</td>
			      <td colspan="2" class="table-dark">Data de Cadastro</td>
			      <td colspan="2" class="table-dark"></td>
			      
			    </tr>
				<?php while($linhaTabela = mysqli_fetch_array($result)){ ?>
					<tr>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[1])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[2])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[3])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[4])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[12])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[13])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[14])?></td>
						<td colspan="2" class="table-active"><?php echo ($linhaTabela[15])?></td>
						<td><a href="alteraPaciente.php?id=<?php echo($linhaTabela[0]) ?> "><button type="button" class="btn btn-outline-warning btn-sm">Alterar</button></a></td>
						<td><a href="apagaPaciente.php?id=<?php echo($linhaTabela[0]) ?> "><button type="button" class="btn btn-outline-danger btn-sm">Apagar</button></a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>