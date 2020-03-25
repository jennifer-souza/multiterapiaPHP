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
			<h2 class="border border-secondary rounded bg-secondary text-white">Lista de Agendamentos</h2>
			<hr />
			<table class="table table-hover table-sm border border-secondary">
			    <tr>
			      <td class="table-dark">Paciente</td>
			      <td class="table-dark">Profissional</td>
			      <td class="table-dark">Data do agendamento</td>
			      <td class="table-dark">Hora do agendamento</td>
			      <td class="table-dark"></td>
			      <td class="table-dark"></td>
			    </tr>
				<?php 
				while($linhaTabela = mysqli_fetch_array($result)){
				?>
				<tr>
					<td class="table-active"><?php echo ($linhaTabela[1])?></td>
					<td  class="table-active"><?php echo ($linhaTabela[2])?></td>
					<td class="table-active"><?php echo ($linhaTabela[3])?></td>
					<td class="table-active"><?php echo ($linhaTabela[4])?></td>
					<td><a href="alteraAgendamento.php?id=<?php echo($linhaTabela[0]) ?> "><button type="button" class="btn btn-outline-warning btn-sm">Alterar</button></a></td>
					<td><a href="apagaAgendamento.php?id=<?php echo($linhaTabela[0]) ?> "><button type="button" class="btn btn-outline-danger btn-sm">Apagar</button></a></td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>
	</body>
</html>