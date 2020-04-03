<?php 
    require_once 'classes/validaLogin.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <?php include('head.html'); ?>
  <body>
    <form action="cadastrar.php" class="prof" method="POST">
      <div class="corpo-form">
        <div class="form-box-cadastrar">
          <div id="btn"></div>
            <div>
              <div class="form-in-form">
                <div class="row">
                  <div class="form-group col-md-12" name="nome_usuario">
                    <label for="name">Nome Completo:</label>
                    <input type="text" class="form-control" name="nome_usuario" required autofocus>
                  </div>
                </div>
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
                <div class="row">
                  <div class="form-group col-md-12" name="confSenha">
                    <label for="name">Confirmar Senha:</label>
                    <input type="password" class="form-control" name="confSenha" required>
                  </div>
                </div>
                  <input type="submit" class="btn btn-lg btn-success btn-block" value="Cadastrar" name="cadastrar">
                  <div  style="padding-left: 45%;">
                    <a href="index.php" class="badge badge-primary">Logar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <?php
     //verifica se clicou no botão
      if(isset($_POST['nome_usuario']))
        {
          //addslashes impede comandos maliciosos para hackear sites
        $nome           = addslashes($_POST['nome_usuario']);
        $email          = addslashes($_POST['email_usuario']);
        $senha          = addslashes($_POST['senha_usuario']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        //verifica se está preenchido
        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
          {
            //conexão com o banco e verificação/exibição de msg erro/confirmação
            $u->conectar("mdata","localhost","root","");
            //variável msgErro está na classe Usuario
            if($u->msgErro == "")
            {
              if($senha == $confirmarSenha)
              {
                if($u->cadastrar($nome,$email,$senha))
                {
                  ?>
                    <div id="msg-sucesso">
                      Cadastrado com sucesso! Faça o login para entrar. 
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
      ?>
    </body>
</html>
