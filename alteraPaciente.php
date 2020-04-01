<?php 
   include('classes/conexao.php');
   session_start();
    if(!isset($_SESSION['id_usuario']))
    {
      header("location: index.php");
      exit;
    }


   if($_SERVER['REQUEST_METHOD'] === 'POST'){

      $id         = $_POST["id_paciente"];
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

      $sql = "UPDATE tb_paciente SET nome_paciente='" . $nome . "', 
      cpf_paciente='" . $cpf . "', rg_paciente='" . $rg . "', 
      dt_nasc_paciente='" . $dataN . "', profissao_paciente='" . $profissao . "', 
      logadouro_paciente='" . $logadouro . "', numero_paciente='" . $numero . "', 
      bairro_paciente='" . $bairro . "', cidade_paciente='" . $cidade . "', 
      cep_paciente='" . $cep . "', uf_paciente='" . $uf . "', 
      telefone_paciente='" . $telefone . "', celular_paciente='" . $celular . "', 
      email_paciente='" . $email . "', dt_cad_paciente='" . $dataC . "' 
      WHERE id_paciente=". $id;
      
      //echo ($sql);
      
      $result = mysqli_query($link, $sql);
      ?>
      <script type="text/javascript">location.replace("listaPaciente.php")</script>
      <?php
   }
   
    if ($_GET['id'] != ""){
      $id = $_GET['id'];
      $sql = "SELECT * FROM tb_paciente WHERE id_paciente =".$id;  
      $pesquisa = mysqli_query($link, $sql);
      while($linhaTabela = mysqli_fetch_array($pesquisa)) {
        
        $nome       = $linhaTabela[1];
        $cpf        = $linhaTabela[2];
        $rg         = $linhaTabela[3];
        $dataN      = $linhaTabela[4];
        $profissao  = $linhaTabela[5];
        $logadouro  = $linhaTabela[6];
        $numero     = $linhaTabela[7];
        $bairro     = $linhaTabela[8];
        $cidade     = $linhaTabela[9];
        $cep        = $linhaTabela[10];
        $uf         = $linhaTabela[11];
        $telefone   = $linhaTabela[12];
        $celular    = $linhaTabela[13];
        $email      = $linhaTabela[14];
        $dataC      = $linhaTabela[15];
      }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
    <body>
    <?php include('header.html'); ?>
        <form action="alteraPaciente.php" class="prof" method="POST">
            <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Editar paciente</h2>
            <hr class="col-md-8" />
            <input type="hidden" value="<?php echo $id; ?>" name="id_paciente">
            <div class="row">
                <div class="form-group col-md-8 name="nome_paciente">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="nome_paciente" value="<?php if ($nome != '') { echo $nome; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4" name="cpf_paciente">
                    <label for="name">CPF:</label>
                    <input type="text" class="form-control" name="cpf_paciente" value="<?php if ($cpf != '') { echo $cpf; } ?>">
                </div>
                <div class="form-group col-md-4" name="rg_paciente">
                    <label for="name">RG:</label>
                    <input type="text" class="form-control" name="rg_paciente" value="<?php if ($rg != '') { echo $rg; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3" name="dt_nasc_paciente">
                    <label for="name">Data de nascimento:</label>
                    <input type="date" class="form-control" name="dt_nasc_paciente" value="<?php if ($dataN != '') { echo $dataN; } ?>">
                </div>
                <div class="form-group col-md-5" name="profissao_paciente">
                    <label for="name">Profissão:</label>
                    <input type="text" class="form-control" name="profissao_paciente" value="<?php if ($profissao != '') { echo $profissao; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8" name="logadouro_paciente">
                    <label for="name">Logadouro(Ex: Rua, Avenida):</label>
                    <input type="text" class="form-control" name="logadouro_paciente" value="<?php if ($logadouro != '') { echo $logadouro; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2" name="numero_paciente">
                    <label for="name">Nº:</label>
                    <input type="text" class="form-control" name="numero_paciente" value="<?php if ($numero != '') { echo $numero; } ?>">
                </div>
                <div class="form-group col-md-6" name="bairro_paciente">
                    <label for="name">Bairro:</label>
                    <input type="text" class="form-control" name="bairro_paciente" value="<?php if ($bairro != '') { echo $bairro; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5" name="cidade_paciente">
                    <label for="name">Cidade:</label>
                    <input type="text" class="form-control" name="cidade_paciente" value="<?php if ($cidade != '') { echo $cidade; } ?>">
                </div>
                <div class="form-group col-md-3" name="cep_paciente">
                    <label for="name">CEP:</label>
                    <input type="text" class="form-control"  name="cep_paciente" value="<?php if ($cep != '') { echo $cep; } ?>">
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-2" name="uf_paciente">
                <label for="name">UF:</label>
                <select class="form-control browser-default custom-select" 
                        name="uf_paciente" style="width: 100%;">
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
                    <input type="text" class="form-control"  name="telefone_paciente" value="<?php if ($telefone != '') { echo $telefone; } ?>">
                </div>
                <div class="form-group col-md-3" name="celular_paciente">
                    <label for="name">Celular:</label>
                    <input type="text" class="form-control"  name="celular_paciente" value="<?php if ($celular != '') { echo $celular; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5" name="email_paciente">
                    <label for="name">E-mail:</label>
                    <input type="text" class="form-control"  name="email_paciente" value="<?php if ($email != '') { echo $email; } ?>">
                </div>
                <div class="form-group col-md-3" name="dt_cad_paciente">
                    <label for="name">Data do cadastro:</label>
                    <input type="date" class="form-control"  name="dt_cad_paciente" value="<?php if ($dataC != '') { echo $dataC; } ?>">
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