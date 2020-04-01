<?php 
   include('classes/conexao.php');
   session_start();
      if(!isset($_SESSION['id_usuario']))
      {
        header("location: index.php");
        exit;
      }


   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $id    = $_POST["id"];
      $pac   = $_POST["idpaciente"];
      $prof  = $_POST["idprofissional"];
      $data  = $_POST["data"];
      $hora  = $_POST["hora"];
      $mot   = $_POST["motivo"];
      $idarea   = $_POST["idarea"];
      
      $sql = "UPDATE tb_agendamento SET idpaciente='" . $pac . "', 
      idprofissional='" . $prof . "', data='" . $data . "', 
      hora='" . $hora . "', motivo='" . $mot . "', idarea='" . $idarea . "' WHERE id=" . $id;
      
      //echo ($sql);
      $result = mysqli_query($link, $sql);
      ?>
      <script type="text/javascript">location.replace("listaAgendamento.php")</script>
      <?php
   }
    
    if($_GET['id'] != ""){
      $id = $_GET['id'];
      $sql = "SELECT * FROM tb_agendamento WHERE id ='$id'" ;  
      $result = mysqli_query($link, $sql);
      while($linhaTabela = mysqli_fetch_array($result)) {
        
        $pac   = $linhaTabela[1];
        $prof  = $linhaTabela[2];
        $data  = $linhaTabela[3];
        $hora  = date("H:i", strtotime($linhaTabela[4]));
        $mot   = $linhaTabela[5];
        $area  = $linhaTabela[6];
      }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
<body>
<?php include('header.html'); ?>
    <form action="alteraAgendamento.php" class="prof" method="POST">
        <h2 class="border border-secondary rounded bg-secondary text-white col-md-8">Editar Agendamento</h2>
        <hr class="col-md-8" />
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="row">
            <div class="form-group col-md-8" name="idpaciente">
                <label for="name">Paciente:</label>
                <select class="form-control browser-default custom-select" 
                        name="idpaciente" style="width: 100%;">
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
                        name="idprofissional" style="width: 100%;">
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
                        name="idarea" style="width: 100%;">
                    <option selected>Selecione a área do atendimento</option>
                    <?php 
                      $sqlArea = "SELECT * FROM tb_area";
                      $resultado = mysqli_query($link, $sqlArea);
                        while($linhaTabela = mysqli_fetch_array($resultado)){ ?>
                          <option value="<?php echo $linhaTabela[0]; ?>"><?php echo $linhaTabela[1]; ?></option>
                    <?php } ?>
                </select>  
            </div>
            <div class="form-group col-md-2" name="data">
                <label for="name">Data:</label>
                <input type="date" class="form-control" name="data">
            </div>
            <div class="form-group col-md-2" name="hora">
                <label for="name">Hora:</label>
                <input type="time" class="form-control" name="hora">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8" name="motivo">
                <label for="name">Motivo:</label>
                <textarea class="form-control" name="motivo" rows="4"><?php if ($mot != '') { echo $mot; } ?></textarea>
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