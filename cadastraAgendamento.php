<?php 
    require_once 'classes/paciente.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Multiterapia</title>
    <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Cadastros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Agendamentos</a>
        </li>
      </ul>
      <div></div>
      <nav>
        <ul class="navbar-nav">
          <li> </li>
          <li> </li>
          <li> </li>
          <li class="nav-item">
            <a class="nav-link" href="sair.php"><strong>Sair</strong></a>
          </li>
        </ul>
      </nav>
    </nav>
    <form action="cadastroAgendamento.php" class="prof" method="POST">
        <hr />
        <h2 class="border border-secondary">Novo Agendamento</h2>
        <hr />
        <div class="row">
            <div class="form-group col-md-6" name="area_atuacao">
                <label for="name">Paciente:</label>
                    <select class="form-control browser-default custom-select" 
                            name="area_atuacao" style="width: 100%;">
                        <option selected>Selecione sua área de atuação</option>s
                        <option value="fisioterapia">Fisioterapia</option>
                        <option value="psicologia">Psicologia</option>
                        <option value="nutricao">Nutrição</option>
                        <option value="fonoaudiologia">Fonoaudiologia</option>
                    </select>  
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6" name="area_atuacao">
                <label for="name">Profissional:</label>
                    <select class="form-control browser-default custom-select" 
                            name="area_atuacao" style="width: 100%;">
                        <option selected>Selecione sua área de atuação</option>s
                        <option value="fisioterapia">Fisioterapia</option>
                        <option value="psicologia">Psicologia</option>
                        <option value="nutricao">Nutrição</option>
                        <option value="fonoaudiologia">Fonoaudiologia</option>
                    </select>  
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2" name="dt_nasc_paciente">
                <label for="name">Data de nascimento:</label>
                <input type="date" class="form-control" name="dt_nasc_paciente">
            </div>
            <div class="form-group col-md-4" name="profissao_paciente">
                <label for="name">Profissão:</label>
                <input type="text" class="form-control" name="profissao_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 name="logadouro_paciente">
                <label for="name">Logadouro(Ex: Rua, Avenida):</label>
                <input type="text" class="form-control" name="logadouro_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1" name="numero_paciente">
                <label for="name">Nº:</label>
                <input type="text" class="form-control" name="numero_paciente">
            </div>
            <div class="form-group col-md-5" name="bairro_paciente">
                <label for="name">Bairro:</label>
                <input type="text" class="form-control" name="bairro_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cidade_paciente">
                <label for="name">Cidade:</label>
                <input type="text" class="form-control" name="cidade_paciente">
            </div>
            <div class="form-group col-md-2" name="cep_paciente">
                <label for="name">CEP:</label>
                <input type="text" class="form-control" name="cep_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1" name="uf_paciente">
                <label for="name">UF:</label>
                <input type="text" class="form-control" name="uf_paciente">
            </div>
            <div class="form-group col-md-2" name="telefone_paciente">
                <label for="name">Telefore:</label>
                <input type="text" class="form-control" name="telefone_paciente">
            </div>
            <div class="form-group col-md-3" name="celular_paciente">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="email_paciente">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_paciente">
            </div>
            <div class="form-group col-md-2" name="dt_cad_paciente">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_paciente">
            </div>
        </div>
        <hr />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 30%;">
            <div class="btn-group mr-2" role="group">
              <button type="button" class="btn btn-danger">Cancelar</button>
            </div>
            <div class="btn-group mr-2" role="group">
              <button type="button" class="btn btn-success">Salvar</button>
            </div>  
        </div>
        <hr />
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