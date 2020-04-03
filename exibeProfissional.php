<?php 
  session_start();
    if(!isset($_SESSION['id_usuario']))
    {
      header("location: index.php");
      exit;
    }
    // Para que esteja acessivel a todo o script
    include('classes/conexao.php');
    
    if ($_GET['id'] != ""){
      $id = $_GET['id'];
      $sql = "SELECT * FROM tb_profissional WHERE id_profissional='$id'";  
      $pesquisa = mysqli_query($link, $sql);
      while($linhaTabela = mysqli_fetch_array($pesquisa)) {
        $nome     = $linhaTabela[1];
        $licenca  = $linhaTabela[2];
        $cpf      = $linhaTabela[3];
        $rg       = $linhaTabela[4];
        $email    = $linhaTabela[5];
        $celular  = $linhaTabela[6];
        $area     = $linhaTabela[7];
        $dataC    = $linhaTabela[8];
      }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
  <body>
    <?php include('header.html'); ?>
    <form action="exibeProfissional.php" class="prof" method="_GET">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Detalhar profissional</h2>
        <hr class="col-md-8" />
        <input type="hidden" value="<?php echo $id; ?>" name="id_profissional">
        <div class="row">
            <div class="form-group col-md-8" name="nome_profissional">
                <label for="name">Nome:</label>
                <?php /* Exemplo para escrever no campo caso exista um resultado para o valor de pesquisa */ ?>
                <input type="text" class="form-control" name="nome_profissional" value="<?php if ($nome != '') { echo $nome; } ?>" disabled> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="idarea">
                <label for="name">Área de atuação:</label>
                <select class="form-control browser-default custom-select" 
                        name="idarea" style="width: 100%;" disabled>
                    <?php 
                    // Selecionar dados da tabela de área
                      $sqlArea = "SELECT * FROM tb_area";
                      $resultado = mysqli_query($link, $sqlArea);
                    // Ler resultados da tabela e escrever na combobox
                        while($linhaTabela = mysqli_fetch_array($resultado)){ 
                          // Se o código da área for o mesmo que está no resultado ele aparece selecionado
                          if ( $area == $linhaTabela[0] ) {
                            echo '<option value="' . $linhaTabela[0] . '" selected>' . $linhaTabela[1] . '</option>';
                          }
                          // Se não for aparece na lista normalmente para ser selecionado
                          else {
                            echo '<option value="' . $linhaTabela[0] . '" >' . $linhaTabela[1] . '</option>';
                          }
                        }
                    ?>
                </select>  
            </div>
            <div class="form-group col-md-4" name="licenca_atuacao">
                <label for="name">Licença profissional:</label>
                <input type="text" class="form-control" name="licenca_atuacao" value="<?php if ($licenca != '') { echo $licenca; } ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cpf_profissional">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" name="cpf_profissional" value="<?php if ($cpf != '') { echo $cpf; } ?>" disabled>
            </div>
            <div class="form-group col-md-4" name="rg_profissional">
                <label for="name">RG:</label>
                <input type="text" class="form-control" name="rg_profissional" value="<?php if ($rg != '') { echo $rg; } ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="email_profissional">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_profissional" value="<?php if ($email != '') { echo $email; } ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="celular_profissional">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_profissional" value="<?php if ($celular != '') { echo $celular; } ?>" disabled>
            </div>
            <div class="form-group col-md-4" name="dt_cad_profissional">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_profissional" value="<?php if ($dataC != '') { echo $dataC; } ?>" disabled>
            </div>
        </div>
        <hr class="col-md-8" />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 55%;">
            <div class="btn-group mr-2" role="group">
              <a href="listaProfissional.php ?> ">
                <button type="button" class="btn btn-outline-danger">Voltar</button>
              </a>
            </div> 
        </div>
        <hr class="col-md-8" />
    </form>
  </body>
</html>