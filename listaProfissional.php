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
			$sql = "SELECT pf.*, a.area FROM tb_profissional pf
					INNER JOIN tb_area a ON a.id_area = pf.idarea";
			$result = mysqli_query($link, $sql);
		?>
		<div class="prof">
			<h2 class="border border-secondary rounded bg-secondary text-white col-md-12">Lista de Profissionais</h2>
			<hr />
			<table class="table table-hover table-sm border border-secondary">
			    <tr>
			      	<td class="table-dark">Nome</td>
			      	<td class="table-dark">Área de Atuação</td>
			      	<td class="table-dark">Licença Profissional</td>
			      	<td class="table-dark">CPF</td>
			      	<td class="table-dark">Celular</td>
					<td colspan="3" class="table-dark">
						<a href="cadastraProfissional.php" style="padding-left: 50%;">
							<button class="btn btn-primary btn-sm" >Novo profissional</button>
						</a>
					</td>
			    </tr>
				<?php while($linhaTabela = mysqli_fetch_array($result)){ ?>
				<tr>
					<td class="table-active"><?php echo ($linhaTabela[1])?></td>
					<td class="table-active"><?php echo ($linhaTabela[9])?></td>
					<td class="table-active"><?php echo ($linhaTabela[2])?></td>
					<td class="table-active"><?php echo ($linhaTabela[3])?></td>
					<td class="table-active"><?php echo ($linhaTabela[6])?></td>
					<td class="table-active">
						<a href="exibeProfissional.php?id=<?php echo($linhaTabela[0]) ?>">
							<button type="button" class="btn btn-success btn-sm">Exibir</button>
						</a>
					</td>
					<td class="table-active">
						<a href="alteraProfissional.php?id=<?php echo($linhaTabela[0]) ?>">
							<button type="button" class="btn btn-warning btn-sm">Editar</button>
						</a>
					</td>
					<td class="table-active">	
						<a href="apagaProfissional.php?id=<?php echo($linhaTabela[0]) ?>">
							<button type="button" class="btn btn-danger btn-sm">Apagar</button>
						</a>
					</td>
				</tr>
				<?php }	?>
			</table>
		</div>
	</body>
</html>