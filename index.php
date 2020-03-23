<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
  <body>
    <?php

      session_start();

      if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      include('classes/conexao.php');

      //addslashes impede comandos maliciosos para hackear o site
      $email = addslashes($_POST['email_usuario']);
      $senha = addslashes($_POST['senha_usuario']);
      //verifica se clicou no botão
      if(isset($_POST['email_usuario']))
      {
        $sql = "SELECT * FROM tb_login WHERE email_usuario='".$email."' AND senha_usuario='".$senha."'";
        echo ($sql);
        mysqli_query($link, $sql);
         
        if(!empty($email) && !empty($senha))
        {
          $_SESSION['email_usuario'];
          $_SESSION['senha_usuario'];
          ?>
          <script type="text/javascript">location.replace("home.php")</script>
          <?php
          //header('location: http://localhost/MultiterapiaPHP/home.php');
        }
        else{
          unset ($_SESSION['email_usuario']);
          unset ($_SESSION['senha_usuario']);
          ?>
          <script type="text/javascript">location.replace("index.php")</script>
          <?php
          echo"Erro! E-mail ou senha incorreto <br/>"; #Tentem melhorar a execução caso seja um usuário inválido!
        }
      }
    }
    ?>  
    <form action="index.php" method="POST">
      <div class="corpo-form">
        <div class="form-box">
          <div id="btn"></div>
            <div>
              <div class="form-in-form">
                <div class="row">
                  <div class="form-group col-md-12" name="email_usuario">
                    <label for="name">E-mail:</label>
                    <input type="email" class="form-control" name="email_usuario">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12" name="senha_usuario">
                    <label for="name">Senha:</label>
                    <input type="password" class="form-control" name="senha_usuario">
                  </div>
                </div>
                <div class="row btn-toolbar" role="toolbar" style="padding-left: 80%;">
                  <div class="btn-group mr-2" role="group" name="entrar">
                    <input type="submit" class="btn btn-success" value="Entrar" name="entrar">
                  </div>   
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
  </body>
</html>
