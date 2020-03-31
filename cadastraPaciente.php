<?php 
  session_start();
    if(!isset($_SESSION['id_usuario']))
    {
      header("location: index.php");
      exit;
    }
    
    include('classes/conexao.php');

   if($_SERVER['REQUEST_METHOD'] === 'POST'){


      $nome       = $_POST["nome_paciente"];
      $cpf        = $_POST["cpf_paciente"];
      $rg         = $_POST["rg_paciente"];
      $dataN      = $_POST["dt_nasc_paciente"];
      $profissao  = $_POST["profissao_paciente"];
      $logadouro  = $_POST["logadouro_paciente"];
      $numero     = $_POST["numero_paciente"];
      $bairro     = $_POST["bairro_paciente"];
      $cidade     = $_POST["cidade_paciente"];
      $cep        = $_POST["cep_paciente"];
      $uf         = $_POST["uf_paciente"];
      $telefone   = $_POST["telefone_paciente"];
      $celular    = $_POST["celular_paciente"];
      $email      = $_POST["email_paciente"];
      $dataC      = $_POST["dt_cad_paciente"];

      $sql = "INSERT INTO tb_paciente VALUES('','" . $nome . "', '" . $cpf . "', 
      '" . $rg . "', '" . $dataN . "', '" . $profissao . "', '" . $logadouro . "', 
      '" . $numero . "', '" . $bairro . "', '" . $cidade . "', '" . $cep . "', 
      '" . $uf . "', '" . $telefone . "', '" . $celular . "', '" . $email . "', 
      '" . $dataC . "')";
      //echo ($sql);
      $result = mysqli_query($link, $sql);
      ?>
      <script type="text/javascript">location.replace("listaPaciente.php")</script>
      <?php
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
<body>
<?php include('header.html'); ?>
    <form action="cadastraPaciente.php" class="prof" method="POST">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Novo paciente</h2>
        <hr class="col-md-8" />
        <div class="row">
            <div class="form-group col-md-8" name="nome_paciente">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="nome_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cpf_paciente">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" name="cpf_paciente">
            </div>
            <div class="form-group col-md-4" name="rg_paciente">
                <label for="name">RG:</label>
                <input type="text" class="form-control" name="rg_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3" name="dt_nasc_paciente">
                <label for="name">Data de nascimento:</label>
                <input type="date" class="form-control" name="dt_nasc_paciente">
            </div>
            <div class="form-group col-md-5" name="profissao_paciente">
                <label for="name">Profissão:</label>
                <input type="text" class="form-control" name="profissao_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="logadouro_paciente">
                <label for="name">Logadouro(Ex: Rua, Avenida):</label>
                <input type="text" class="form-control" name="logadouro_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2" name="numero_paciente">
                <label for="name">Nº:</label>
                <input type="text" class="form-control" name="numero_paciente">
            </div>
            <div class="form-group col-md-6" name="bairro_paciente">
                <label for="name">Bairro:</label>
                <input type="text" class="form-control" name="bairro_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5" name="cidade_paciente">
                <label for="name">Cidade:</label>
                <input type="text" class="form-control" name="cidade_paciente">
            </div>
            <div class="form-group col-md-3" name="cep_paciente">
                <label for="name">CEP:</label>
                <input type="text" class="form-control" name="cep_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2" name="uf_paciente">
                <label for="name">UF:</label>
                <select class="form-control browser-default custom-select" 
                        name="uf_paciente" style="width: 100%;">
                    <option selected>Estado</option>
                    <?php 
                    // Selecionar dados da tabela de área
                      $sqlEst = "SELECT * FROM estados";
                      $resultado = mysqli_query($link, $sqlEst);
                    // Ler resultados da tabela e escrever na combobox
                        while($linhaTabela = mysqli_fetch_array($resultado)){ ?>
                          <option value="<?php echo $linhaTabela[0]; ?>"><?php echo $linhaTabela[1]; ?></option>
                        <?php } ?>
                </select>  
            </div>
            <div class="form-group col-md-3" name="telefone_paciente">
                <label for="name">Telefore:</label>
                <input type="text" class="form-control" name="telefone_paciente">
            </div>
            <div class="form-group col-md-3" name="celular_paciente">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5" name="email_paciente">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_paciente">
            </div>
            <div class="form-group col-md-3" name="dt_cad_paciente">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_paciente">
            </div>
        </div>
        <hr class="col-md-8" />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 50%;">
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-danger" value="Cancelar">
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>    
        </div>
        <hr class="col-md-8" />
    </form>
</body>
</html>