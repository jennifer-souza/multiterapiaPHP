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
			$sql = "SELECT * FROM tb_profissional";
			$result = mysqli_query($link, $sql);
		?>
		<div class="prof">
			<h2 class="border border-secondary rounded bg-secondary text-white">Lista de Profissionais</h2>
			<hr />
			<table class="table table-hover table-sm border border-secondary">
			    <tr>
			      <td class="table-dark">Nome</td>
			      <td class="table-dark">Área de Atuação</td>
			      <td class="table-dark">Licença Profissional</td>
			      <td class="table-dark">CPF</td>
			      <td class="table-dark">RG</td>
			      <td class="table-dark">Email</td>
			      <td class="table-dark">Celular</td>
			      <td class="table-dark">Data de Cadastro</td>
			      <td class="table-dark"></td>
			      <td class="table-dark"></td>
			    </tr>
				<?php 
				while($linhaTabela = mysqli_fetch_array($result)){
				?>
				<tr>
					<td class="table-active"><?php echo ($linhaTabela[1])?></td>
					<td  class="table-active"><?php echo ($linhaTabela[7])?></td>
					<td class="table-active"><?php echo ($linhaTabela[2])?></td>
					<td class="table-active"><?php echo ($linhaTabela[3])?></td>
					<td class="table-active"><?php echo ($linhaTabela[4])?></td>
					<td class="table-active"><?php echo ($linhaTabela[5])?></td>
					<td class="table-active"><?php echo ($linhaTabela[6])?></td>
					<td class="table-active"><?php echo ($linhaTabela[8])?></td>
					<td><a href="alteraProfissional.php?id=<?php echo($linhaTabela[0]) ?> "><button type="button" class="btn btn-outline-warning btn-sm">Alterar</button></a></td>
					<td><a href="apagaProfissional.php?id=<?php echo($linhaTabela[0]) ?> "><button type="button" class="btn btn-outline-danger btn-sm">Apagar</button></a></td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>
	</body>
</html>