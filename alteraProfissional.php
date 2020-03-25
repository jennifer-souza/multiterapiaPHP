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
<?php while($linhaTabela = mysqli_fetch_array($result)){ ?>
    <form action="alteraProfissional.php" class="prof" method="POST">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Editar profissional</h2>
        <hr class="col-md-8" />
        <input type="hidden" value="<?php echo($linhaTabela[0]) ?>" name="id_profissional">
        <div class="row">
            <div class="form-group col-md-8" name="nome_profissional">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" value="<?php echo($linhaTabela[1]) ?>" name="nome_profissional">
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-4" name="area">
                <label for="name">Área de atuação:</label>
                    <select class="form-control browser-default custom-select" 
                            name="area" style="width: 100%;">
                        
                        <option <?php echo $linhaTabela[7]=='fisioterapia'? ('selected ') :'' ?> value="fisioterapia">Fisioterapia</option>
                        <option <?php echo $linhaTabela[7]=='psicologia'? ('selected ') :''  ?>value="psicologia">Psicologia</option>
                        <option <?php echo $linhaTabela[7]=='nutricao'? ('selected ') :''  ?>value="nutricao">Nutrição</option>
                        <option <?php echo $linhaTabela[7]=='fonoaudiologia'? ('selected ') :''  ?>value="fonoaudiologia">Fonoaudiologia</option>
                    </select>  
            </div>
            <div class="form-group col-md-4" name="licenca_atuacao">
                <label for="name">Licença profissional:</label>
                <input type="text" class="form-control" value="<?php echo($linhaTabela[2]) ?>" name="licenca_atuacao">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cpf_profissional">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" value="<?php echo($linhaTabela[3]) ?>" name="cpf_profissional">
            </div>
            <div class="form-group col-md-4" name="rg_profissional">
                <label for="name">RG:</label>
                <input type="text" class="form-control" value="<?php echo($linhaTabela[4]) ?>" name="rg_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="email_profissional">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" value="<?php echo($linhaTabela[5]) ?>" name="email_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="celular_profissional">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" value="<?php echo($linhaTabela[6]) ?>" name="celular_profissional">
            </div>
            <div class="form-group col-md-4" name="dt_cad_profissional">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" value="<?php echo($linhaTabela[8]) ?>" name="dt_cad_profissional">
            </div>
        </div>
        <hr />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 50%;">
            <div class="btn-group mr-2" role="group">
              <input type="button" class="btn btn-danger" value="Cancelar">
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>   
        </div>
        <hr />
    </form>
<?php } ?>
</body>
</html>