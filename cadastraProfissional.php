<?php 
   if($_SERVER['REQUEST_METHOD'] === 'POST'){

      include('classes/conexao.php');
      $nome = $_POST["nome_profissional"];
      $licenca = $_POST["licenca_atuacao"];
      $cpf = $_POST["cpf_profissional"];
      $rg = $_POST["rg_profissional"];
      $email = $_POST["email_profissional"];
      $celular = $_POST["celular_profissional"];
      $area = $_POST["area_atuacao"];
      $dataC = $_POST["dt_cad_profissional"];
      $sql = "INSERT INTO tb_profissional VALUES('','" . $nome . "', '" . $licenca . "' ,'" . $cpf . "', '" . $rg . "', '" . $email . "' , '" . $celular . "' , '" . $area . "', '" . $dataC . "')";
      //echo ($sql);
      mysqli_query($link, $sql);
      ?>
      <script type="text/javascript">location.replace("cadastraProfissional.php")</script>
      <?php
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
<body>
<?php include('header.html'); ?>

    <form action="cadastraProfissional.php" class="prof" method="POST">
        <hr />
          <h2>Novo profissional</h2>
        <hr />
        <div class="row">
            <div class="form-group col-md-6" name="nome_profissional">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="nome_profissional">
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-3" name="area_atuacao">
                <label for="name">Área de atuação:</label>
                    <select class="form-control browser-default custom-select" 
                            name="area_atuacao" style="width: 100%;">
                        <option selected>Selecione sua área de atuação</option>s
                        <option value="fisioterapia">Fisioterapia</option>
                        <option value="psicologia">Psicologia</option>
                        <option value="nutricao">Nutrição</option>
                        <option value="fonoaudiologia">Fonoaudiologia</option>
                    </select>  
            </div>
            <div class="form-group col-md-3" name="licenca_atuacao">
                <label for="name">Licença profissional:</label>
                <input type="text" class="form-control" name="licenca_atuacao">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3" name="cpf_profissional">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" name="cpf_profissional">
            </div>
            <div class="form-group col-md-3" name="rg_profissional">
                <label for="name">RG:</label>
                <input type="text" class="form-control" name="rg_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6" name="email_profissional">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_profissional">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3" name="celular_profissional">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_profissional">
            </div>
            <div class="form-group col-md-3" name="dt_cad_profissional">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_profissional">
            </div>
        </div>
        <hr />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 30%;">
            <div class="btn-group mr-2" role="group">
              <button type="button" class="btn btn-danger">Cancelar</button>
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>  
        </div>
        <hr />
    </form>
<!--  
    <?php
     //verifica se clicou no botão
      if(isset($_POST['nome_profissional']))
        {
          //addslashes impede comandos maliciosos para hackear sites
        $nome = addslashes($_POST['nome_profissional']);
        $crm = addslashes($_POST['crm_profissional']);
        $celular = addslashes($_POST['cel_profissional']);
        $email = addslashes($_POST['email_profissional']);
        $senha = addslashes($_POST['senha_profissional']);
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
      ?> -->
</body>
</html>