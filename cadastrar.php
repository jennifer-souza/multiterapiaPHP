
<!DOCTYPE html>
<?php 
  require_once 'classes/usuarios.php';
  $u = new Usuario;
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <title>Cadastro - Multiterapia</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="corpo-form-Cad">
        <div class="form-box">
            <div id="title">
              <h2>Cadastro</h2> 
            </div>
            <div class="form-in-form">
                <div>
                    <form method="POST">
                      <input name="nome_usuario" type="text" class="input-field" placeholder="Nome Completo" maxlength="50">
                      <input name="crm_usuario" type="text" class="input-field" placeholder="CRM" maxlength="20">  
                      <input name="cel_usuario" type="text" class="input-field" placeholder="Celular"  maxlength="20">
                      <input name="email_usuario" type="text" class="input-field" placeholder="Email" maxlength="50">
                      <input name="senha_usuario" type="password" class="input-field" placeholder="Senha" maxlength="15">
                      <input name="confSenha" type="password" class="input-field" placeholder="Confirmar senha" maxlength="15">
                      <input type="submit" value="Cadastrar">
                  </form>
                </div>
            </div>
        </div>
     </div>
      <?php
     //verifica se clicou no botão
      if(isset($_POST['nome_usuario']))
        {
          //addslashes impede comandos maliciosos para hackear sites
        $nome = addslashes($_POST['nome_usuario']);
        $crm = addslashes($_POST['crm_usuario']);
        $celular = addslashes($_POST['cel_usuario']);
        $email = addslashes($_POST['email_usuario']);
        $senha = addslashes($_POST['senha_usuario']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        //verifica se está preenchido
        if(!empty($nome) && !empty($crm) && !empty($celular) && 
          !empty($email) && !empty($senha) && !empty($confirmarSenha))
          {
            //conexão com o banco e verificação/exibição de msg erro/confirmação
            $u->conectar("multiterapiabd","localhost","root","");
            //variável msgErro está na classe Usuario
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
      ?>
    </body>
</html>
