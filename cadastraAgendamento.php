<?php 
  session_start();
  if(!isset($_SESSION['id_usuario']))
  {
    header("location: index.php");
    exit;
  }

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
              <input type="submit" class="btn btn-danger" value="Cancelar">
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>   
        </div>
        <hr class="col-md-8" />
    </form>
<!--    <?php
     //verifica se clicou no botão
      if(isset($_POST['nome_paciente']))
        {
          //addslashes impede comandos maliciosos para hackear sites
        $nome = addslashes($_POST['nome_paciente']);
        $crm = addslashes($_POST['crm_paciente']);
        $celular = addslashes($_POST['cel_paciente']);
        $email = addslashes($_POST['email_paciente']);
        $senha = addslashes($_POST['senha_paciente']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        //verifica se está preenchido
        if(!empty($nome) && !empty($crm) && !empty($celular) && 
          !empty($email) && !empty($senha) && !empty($confirmarSenha))
          {
            //conexão com o banco e verificação/exibição de msg erro/confirmação
            $u->conectar("multiterapiabd","localhost","root","");
            //variável msgErro está na classe_paciente
            if($u->msgErro == "")
            {
              if($senha == $confirmarSenha)
              {
                if($u->cadastrar($nome,$crm,$celular,$email,$senha))
                {
                  ?>
                    <div id="msg-sucesso">
                      Cadastrado com sucesso! Faça o login para entrar. 
                        <a href="index.php"><strong>Clique aqui!</strong></a>
                    </div>
                  <?php
                }
                else
                {
                  ?>
                    <div class="msg-erro">
                      Email já cadastrado!
                    </div>
                  <?php
                }
              }
              else
              {
                ?>
                  <div class="msg-erro">
                    Senha e Confirmar senha não correspondem
                  </div>
                <?php
              }
            }
            else
            {
              ?>
                <div class="msg-erro">
                  <?php echo "Erro: ".$u->msgErro; ?>
                </div>
              <?php
            }
          }
          else
          {
              ?>
                <div class="msg-erro">
                  Preencha todos os campos!
                </div>
              <?php
          }
        }
      ?> -->
</body>
</html>