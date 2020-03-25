<?php 
   include('classes/conexao.php');
   session_start();
      if(!isset($_SESSION['id_usuario']))
      {
        header("location: index.php");
        exit;
      }

   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $id = $_POST["id_profissional"];
      $nome = $_POST["nome_profissional"];
      $licenca = $_POST["licenca_atuacao"];
      $cpf = $_POST["cpf_profissional"];
      $rg = $_POST["rg_profissional"];
      $email = $_POST["email_profissional"];
      $celular = $_POST["celular_profissional"];
      $area = $_POST["area_atuacao"];
      $dataC = $_POST["dt_cad_profissional"];
      
      $sql = "UPDATE tb_profissional SET nome_profissional='" . $nome . "', area_profissional='" . $area . "', licenca_atuacao='" . $licenca . "', cpf_profissional='" . $cpf . "', rg_profissional='" . $rg . "', email_profissional='" . $email . "', celular_profissional='" . $celular . "', dt_cad_profissional='" . $dataC . "' WHERE id_profissional=" . $id;
      //echo ($sql);
      mysqli_query($link, $sql);
      ?>
      <script type="text/javascript">location.replace("listaProfissional.php")</script>
      <?php
   }
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_profissional WHERE id_profissional =" . $id;
    $result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
<body>
<?php include('header.html'); ?>
    <form action="cadastroAgendamento.php" class="prof" method="POST">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Novo Agendamento</h2>
        <hr class="col-md-8" />
        <div class="row">
            <div class="form-group col-md-8" name="idpaciente">
                <label for="name">Paciente:</label>
                <select class="form-control browser-default custom-select" 
                        name="idpaciente" style="width: 100%;">
                    <option selected>Selecione o paciente que será atendido</option>s
                    <option value="fisioterapia">Fisioterapia</option>
                    <option value="psicologia">Psicologia</option>
                    <option value="nutricao">Nutrição</option>
                    <option value="fonoaudiologia">Fonoaudiologia</option>
                </select>  
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="idprofissional">
                <label for="name">Profissional:</label>
                <select class="form-control browser-default custom-select" 
                        name="idprofissional" style="width: 100%;">
                    <option selected>Selecione o profissional que irá atender</option>s
                    <option value="fisioterapia">Fisioterapia</option>
                    <option value="psicologia">Psicologia</option>
                    <option value="nutricao">Nutrição</option>
                    <option value="fonoaudiologia">Fonoaudiologia</option>
                </select>  
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="data">
                <label for="name">Data do agendamento:</label>
                <input type="datetime-local" class="form-control" name="data">
            </div>
            <div class="form-group col-md-4" name="hora">
                <label for="name">Hora do agendamento:</label>
                <input type="time" class="form-control" name="hora">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="motivo">
                <label for="name">Motivo:</label>
                <textarea class="form-control" name="motivo" rows="4"></textarea>
            </div>
        </div>
        <hr class="col-md-8" />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 50%;">
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-danger" href="listaAgendamento.php" value="Cancelar">
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>   
        </div>
        <hr class="col-md-8" />
    </form>
</body>
</html>