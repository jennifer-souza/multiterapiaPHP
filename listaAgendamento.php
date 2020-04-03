<?php 
	include('classes/conexao.php');
	session_start();
	  if(!isset($_SESSION['id_usuario']))
	  {
	    header("location: index.php");
	    exit;
	  }

	$sql = "SELECT ag.*, pc.nome_paciente, pf.nome_profissional, a.area FROM tb_agendamento ag
			INNER JOIN tb_paciente pc ON pc.id_paciente = ag.idpaciente
			INNER JOIN tb_profissional pf ON pf.id_profissional = ag.idprofissional
			INNER JOIN tb_area a ON a.id_area = ag.idarea";			
  	$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
	<body>
		<?php include('header.html'); ?>
		<div class="prof">
			<h2 class="border border-secondary rounded bg-secondary text-white col-md-12">Lista de Agendamentos</h2>
			<hr />
			<table class="table table-hover table-sm border border-secondary">
			    <tr>
				    <td class="table-dark">Paciente</td>
				    <td class="table-dark">Profissional</td>
				    <td class="table-dark">Área</td>
				    <td class="table-dark">Data agendada</td>
				    <td class="table-dark">Hora</td>
					<td colspan="3" class="table-dark">
						<a href="cadastraAgendamento.php" style="padding-left: 52%;">
							<button class="btn btn-primary btn-sm">Novo agendamento</button>
						</a>
					</td>
			    </tr>
				<?php while($linhaTabela = mysqli_fetch_array($result)){ ?>
					<tr>
						<td class="table-active"><?php echo ($linhaTabela[7]); ?></td>
						<td class="table-active"><?php echo ($linhaTabela[8]); ?></td>
						<td class="table-active"><?php echo ($linhaTabela[9]); ?></td>
						<td class="table-active"><?php echo date("d/m/Y", strtotime($linhaTabela[3])); ?></td>
						<td class="table-active"><?php echo date("H:i", strtotime($linhaTabela[4])); ?></td>
						<td class="table-active">
							<a href="exibeAgendamento.php?id=<?php echo($linhaTabela[0]) ?>">
								<button type="button" class="btn btn-success btn-sm">	Exibir</button>
							</a>
						</td>
						<td class="table-active">
							<a href="alteraAgendamento.php?id=<?php echo($linhaTabela[0]) ?>">
								<button type="button" class="btn btn-warning btn-sm">Editar</button>
							</a>
						</td>
						<td class="table-active">	
							<a href="apagaAgendamento.php?id=<?php echo($linhaTabela[0]) ?>">
								<button type="button" class="btn btn-danger btn-sm">Apagar</button>
							</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>