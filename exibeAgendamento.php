<?php 
   include('classes/conexao.php');
   session_start();
      if(!isset($_SESSION['id_usuario']))
      {
        header("location: index.php");
        exit;
      }
    
    if($_GET['id'] != ""){
      $id = $_GET['id'];
      $sql = "SELECT * FROM tb_agendamento WHERE id ='$id'";  
      $result = mysqli_query($link, $sql);
      while($linhaTabela = mysqli_fetch_array($result)) {
        
        $pac      = $linhaTabela[1];
        $prof     = $linhaTabela[2];
        $data     = $linhaTabela[3];
        $hora     = date("H:i", strtotime($linhaTabela[4]));
        $mot      = $linhaTabela[5];
        $idarea   = $linhaTabela[6];
      }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
<body>
<?php include('header.html'); ?>
    <form action="exibeAgendamento.php" class="prof" method="_GET">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Detalhar agendamento</h2>
        <hr class="col-md-8" />
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="row">
            <div class="form-group col-md-8" name="idpaciente">
                <label for="name">Paciente:</label>
                <select class="form-control browser-default custom-select" 
                        name="idpaciente" style="width: 100%;" disabled>
                <?php 
                // Selecionar dados da tabela de área
                  $sqlPac = "SELECT * FROM tb_paciente";
                  $resultado = mysqli_query($link, $sqlPac);
                // Ler resultados da tabela e escrever na combobox
                    while($linhaTabela = mysqli_fetch_array($resultado)){ 
                    // Se o código da área for o mesmo que está no resultado ele aparece selecionado
                    if ( $pac == $linhaTabela[0] ) {
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
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="idprofissional">
                <label for="name">Profissional:</label>
                <select class="form-control browser-default custom-select" 
                        name="idprofissional" style="width: 100%;" disabled>
                <?php 
                // Selecionar dados da tabela de área
                  $sqlPro = "SELECT * FROM tb_profissional";
                  $resultado = mysqli_query($link, $sqlPro);
                // Ler resultados da tabela e escrever na combobox
                    while($linhaTabela = mysqli_fetch_array($resultado)){ 
                      // Se o código da área for o mesmo que está no resultado ele aparece selecionado
                      if ( $prof == $linhaTabela[0] ) {
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
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="idarea">
                <label for="name">Área do atendimento:</label>
                <select class="form-control browser-default custom-select" 
                        name="idarea" style="width: 100%;" disabled>
                    <?php 
                      $sqlArea = "SELECT * FROM tb_area";
                      $resultado = mysqli_query($link, $sqlArea);
                        while($linhaTabela = mysqli_fetch_array($resultado)){ 
                          if ( $idarea == $linhaTabela[0] ) {
                            echo '<option value="' . $linhaTabela[0] . '" selected>' . $linhaTabela[1] . '</option>';
                          }
                          else {
                            echo '<option value="' . $linhaTabela[0] . '" >' . $linhaTabela[1] . '</option>';
                          }
                        } 
                    ?>
                </select>  
            </div>
            <div class="form-group col-md-2" name="data">
                <label for="name">Data:</label>
                <input type="date" class="form-control" name="data" value="<?php if ($data != '') { echo $data; } ?>" disabled>
            </div>
            <div class="form-group col-md-2" name="hora">
                <label for="name">Hora:</label>
                <input type="time" class="form-control" name="hora" value="<?php if ($hora != '') { echo $hora; } ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="motivo">
                <label for="name">Motivo:</label>
                <textarea class="form-control" name="motivo" rows="4" disabled><?php if ($mot != '') { echo $mot; } ?></textarea>
            </div>
        </div>
        <hr class="col-md-8" />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 55%;">
            <div class="btn-group mr-2" role="group">
              <a href="listaAgendamento.php ?> ">
                <button type="button" class="btn btn-outline-danger">Voltar</button>
              </a>
            </div> 
        </div>
        <hr class="col-md-8" />
    </form>
</body>
</html>