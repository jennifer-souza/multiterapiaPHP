<?php 
  session_start();
    if(!isset($_SESSION['id_usuario']))
    {
      header("location: index.php");
      exit;
    }
    // Para que esteja acessivel a todo o script
    include('classes/conexao.php');
    
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $nome     = $_POST["nome_profissional"];
      $licenca  = $_POST["licenca_atuacao"];
      $cpf      = $_POST["cpf_profissional"];
      $rg       = $_POST["rg_profissional"];
      $email    = $_POST["email_profissional"];
      $celular  = $_POST["celular_profissional"];
      $area     = $_POST["idarea"];
      $dataC    = $_POST["dt_cad_profissional"];
      
      $sql = "INSERT INTO tb_profissional VALUES('','" . $nome . "', 
      '" . $licenca . "', '" . $cpf . "', '" . $rg . "', 
      '" . $email . "', '" . $celular . "', '" . $area . "', '" . $dataC . "')";
      
      //echo ($sql);
      
      $result = mysqli_query($link, $sql);
      ?>
      <script type="text/javascript">location.replace("listaProfissional.php")</script>
      <?php
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
  <body>
    <?php include('header.html'); ?>
    <form action="cadastraProfissional.php" class="prof" method="POST">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Novo profissional</h2>
        <hr class="col-md-8" />
        <div class="row">
            <div class="form-group col-md-8" name="nome_profissional">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="nome_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="idarea">
                <label for="name">Área de atuação:</label>
                <select class="form-control browser-default custom-select" 
                        name="idarea" style="width: 100%;">
                    <option selected>Selecione sua área de atuação</option>
                    <?php 
                    // Selecionar dados da tabela de área
                      $sqlArea = "SELECT * FROM tb_area";
                      $resultado = mysqli_query($link, $sqlArea);
                    // Ler resultados da tabela e escrever na combobox
                        while($linhaTabela = mysqli_fetch_array($resultado)){ ?>
                          <option value="<?php echo $linhaTabela[0]; ?>"><?php echo $linhaTabela[1]; ?></option>
                        <?php } ?>
                </select>  
            </div>
            <div class="form-group col-md-4" name="licenca_atuacao">
                <label for="name">Licença profissional:</label>
                <input type="text" class="form-control" name="licenca_atuacao">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cpf_profissional">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" name="cpf_profissional">
            </div>
            <div class="form-group col-md-4" name="rg_profissional">
                <label for="name">RG:</label>
                <input type="text" class="form-control" name="rg_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="email_profissional">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="celular_profissional">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_profissional">
            </div>
            <div class="form-group col-md-4" name="dt_cad_profissional">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_profissional">
            </div>
        </div>
        <hr class="col-md-8" />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 50%;">
            <div class="btn-group mr-2" role="group">
              <a href="listaProfissional.php">  
                <input type="submit" class="btn btn-danger" value="Cancelar">
              </a>
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>   
        </div>
        <hr class="col-md-8" />
    </form>
  </body>
</html>