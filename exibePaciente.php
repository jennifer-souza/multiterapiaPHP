<?php 
   include('classes/conexao.php');
   session_start();
    if(!isset($_SESSION['id_usuario']))
    {
      header("location: index.php");
      exit;
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
        <form action="exibePaciente.php" class="prof" method="_GET">
            <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Paciente > 
                <?php echo $nome; ?></h2>
            <hr class="col-md-8" />
            <input type="hidden" value="<?php echo $id; ?>" name="id_paciente">
            <div class="row">
                <div class="form-group col-md-8 name="nome_paciente">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="nome_paciente" value="<?php if ($nome != '') { echo $nome; } ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4" name="cpf_paciente">
                    <label for="name">CPF:</label>
                    <input type="text" class="form-control" name="cpf_paciente" value="<?php if ($cpf != '') { echo $cpf; } ?>" disabled>
                </div>
                <div class="form-group col-md-4" name="rg_paciente">
                    <label for="name">RG:</label>
                    <input type="text" class="form-control" name="rg_paciente" value="<?php if ($rg != '') { echo $rg; } ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3" name="dt_nasc_paciente">
                    <label for="name">Data de nascimento:</label>
                    <input type="date" class="form-control" name="dt_nasc_paciente" value="<?php if ($dataN != '') { echo $dataN; } ?>" disabled>
                </div>
                <div class="form-group col-md-5" name="profissao_paciente">
                    <label for="name">Profissão:</label>
                    <input type="text" class="form-control" name="profissao_paciente" value="<?php if ($profissao != '') { echo $profissao; } ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8" name="logadouro_paciente">
                    <label for="name">Logadouro(Ex: Rua, Avenida):</label>
                    <input type="text" class="form-control" name="logadouro_paciente" value="<?php if ($logadouro != '') { echo $logadouro; } ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2" name="numero_paciente">
                    <label for="name">Nº:</label>
                    <input type="text" class="form-control" name="numero_paciente" value="<?php if ($numero != '') { echo $numero; } ?>" disabled>
                </div>
                <div class="form-group col-md-6" name="bairro_paciente">
                    <label for="name">Bairro:</label>
                    <input type="text" class="form-control" name="bairro_paciente" value="<?php if ($bairro != '') { echo $bairro; } ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5" name="cidade_paciente">
                    <label for="name">Cidade:</label>
                    <input type="text" class="form-control" name="cidade_paciente" value="<?php if ($cidade != '') { echo $cidade; } ?>" disabled>
                </div>
                <div class="form-group col-md-3" name="cep_paciente">
                    <label for="name">CEP:</label>
                    <input type="text" class="form-control"  name="cep_paciente" value="<?php if ($cep != '') { echo $cep; } ?>" disabled>
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-2" name="uf_paciente">
                <label for="name">UF:</label>
                <select class="form-control browser-default custom-select" 
                        name="uf_paciente" style="width: 100%;" disabled>
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
                    <input type="text" class="form-control"  name="telefone_paciente" value="<?php if ($telefone != '') { echo $telefone; } ?>" disabled>
                </div>
                <div class="form-group col-md-3" name="celular_paciente">
                    <label for="name">Celular:</label>
                    <input type="text" class="form-control"  name="celular_paciente" value="<?php if ($celular != '') { echo $celular; } ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5" name="email_paciente">
                    <label for="name">E-mail:</label>
                    <input type="text" class="form-control"  name="email_paciente" value="<?php if ($email != '') { echo $email; } ?>" disabled>
                </div>
                <div class="form-group col-md-3" name="dt_cad_paciente">
                    <label for="name">Data do cadastro:</label>
                    <input type="date" class="form-control"  name="dt_cad_paciente" value="<?php if ($dataC != '') { echo $dataC; } ?>" disabled>
                </div>
            </div>
            <hr class="col-md-8" />
            <div class="row btn-toolbar" role="toolbar" style="padding-left: 55%;">
                <div class="btn-group mr-2" role="group">
                  <a href="listaPaciente.php ?> ">
                    <button type="button" class="btn btn-outline-danger">Voltar</button>
                  </a>
                </div> 
            </div>
            <hr class="col-md-8" />
        </form>
    </body>
</html>