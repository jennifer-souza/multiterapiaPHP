<?php 
  session_start();
    if(!isset($_SESSION['id_usuario']))
    {
      header("location: index.php");
      exit;
    }
    // Para que esteja acessivel a todo o script
    include('classes/conexao.php');
    

    // Suposição tá...
    // Deposi você substitui pelos valores corretos
    $id = $_GET['id'];
    if ($id != ""){
      $sql = "SELECT * FROM tb_profissional WHERE id_profissional ='$id'" ;  
      $pesquisa = mysqli_query($link, $sql);
      while($linhaTabela = mysqli_fetch_array($pesquisa)) {
        $nome     = $linhaTabela[1]; // Coloquei um exemplo no campo "nome"
        $licenca  = $linhaTabela[2];
        $cpf      = $linhaTabela[3];
        $rg       = $linhaTabela[4];
        $email    = $linhaTabela[5];
        $celular  = $linhaTabela[6];
        $area     = $linhaTabela[7]; // campo da combo
        $dataC    = $linhaTabela[8];
      }
    }
    
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $nome     = $_POST["nome_profissional"];
      $licenca  = $_POST["licenca_atuacao"];
      $cpf      = $_POST["cpf_profissional"];
      $rg       = $_POST["rg_profissional"];
      $email    = $_POST["email_profissional"];
      $celular  = $_POST["celular_profissional"];
      $area     = $_POST["idarea"];
      $dataC    = $_POST["dt_cad_profissional"];
      
      // mudar para UPDATE SET ....
      $sql = "UPDATE tb_profissional SETnome_profissional='" . $nome . "', 
      idarea='" . $area . "', licenca_atuacao='" . $licenca . "', 
      cpf_profissional='" . $cpf . "', rg_profissional='" . $rg . "', 
      email_profissional='" . $email . "', celular_profissional='" . $celular . "', 
      dt_cad_profissional='" . $dataC . "' WHERE id_profissional=" . $id;
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
                <?php /* Exemplo para escrever no campo caso exista um resultado para o valor de pesquisa */ ?>
                <input type="text" class="form-control" name="nome_profissional" value="<?php if ($nome != '') { echo $nome; } ?>"> 
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-4" name="idarea">
                <label for="name">Área de atuação:</label>
                <select class="form-control browser-default custom-select" 
                        name="idarea" style="width: 100%;">
                    <option value="0">Selecione sua área de atuação</option>
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
                <input type="text" class="form-control" name="licenca_atuacao" value="<?php if ($licenca != '') { echo $licenca; } ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cpf_profissional">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" name="cpf_profissional" value="<?php if ($cpf != '') { echo $cpf; } ?>">
            </div>
            <div class="form-group col-md-4" name="rg_profissional">
                <label for="name">RG:</label>
                <input type="text" class="form-control" name="rg_profissional" value="<?php if ($rg != '') { echo $rg; } ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="email_profissional">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_profissional" value="<?php if ($email != '') { echo $email; } ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="celular_profissional">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_profissional" value="<?php if ($celular != '') { echo $celular; } ?>">
            </div>
            <div class="form-group col-md-4" name="dt_cad_profissional">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_profissional" value="<?php if ($dataC != '') { echo $dataC; } ?>">
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