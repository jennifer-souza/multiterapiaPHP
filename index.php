<!DOCTYPE html>
<?php 
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login - Multiterapia</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <div class="corpo-form">
          <div class="form-box">
            <div id="btn"></div>
              <div id="title">
                <h2>Login</h2>
              </div>
                <div>
                  <div class="form-in-form">
                    <form method="POST">
                        <input name="email_usuario" type="email" class="input-field" placeholder="Email">
                        <input name="senha_usuario" type="password" class="input-field" placeholder="Senha">
                        <input type="submit" value="Entrar">
                        <a href="cadastrar.php"><strong>Cadastre-se aqui!</strong></a>
                    </form>
                  </div>
              </div>
          </div>
      </div>
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
              $u->conectar("multiterapiabd","localhost","root","");

              if($u->msgErro == "")
              {
                if($u->logar($email,$senha))
                {
                    header("location: home.php");
                }
                else
                {
                  ?>
                    <div id="msg-erro">
                      Email e/ou senha estão incorretos!
                    </div>
                  <?php
                }
              }
              else
              {
                ?>
                  <div id="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                  </div>
                <?php
              }
          }
          else
          {
            ?>
              <div id="msg-erro">
                Preecha os campos!
              </div>
            <?php
          }
      }
          ?>
    </body>
</html>
