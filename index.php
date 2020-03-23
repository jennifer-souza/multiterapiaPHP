<?php 
    require_once 'classes/validaLogin.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
  <body>
    <form action="index.php" class="prof" method="POST">
      <div class="corpo-form">
        <div class="form-box">
          <div id="btn"></div>
            <div>
              <div class="form-in-form">
                <div class="row">
                  <div class="form-group col-md-12" name="email_usuario">
                    <label for="name">E-mail:</label>
                    <input type="email" class="form-control" name="email_usuario" required autofocus>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12" name="senha_usuario">
                    <label for="name">Senha:</label>
                    <input type="password" class="form-control" name="senha_usuario" required>
                  </div>
                </div>
                  <input type="submit" class="btn btn-lg btn-success btn-block" value="Entrar" name="entrar">
                <div  style="padding-left: 40%;">
                  <a href="cadastrar.php" class="badge badge-danger">Cadastre-se</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <?php
      //verifica se clicou no botão
      if(isset($_POST['email_usuario']))
        {
        //addslashes impede comandos maliciosos para hackear sites
        $email = addslashes($_POST['email_usuario']);
        $senha = addslashes($_POST['senha_usuario']);

          //verifica se está preenchido
          if(!empty($email) && !empty($senha))
          {
              $u->conectar("mdata","localhost","root","");

              if($u->msgErro == "")
              {
                if($u->logar($email,$senha))
                {
                    header("location: home.php");
                }
                else
                {
                  ?>
                    <div class="msg-erro">
                      Email e/ou senha estão incorretos!
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
                Preecha os campos!
              </div>
            <?php
          }
      }
    ?>
  </body>
</html>
