<?php/*
Class Paciente
{
    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e)
        {
            $msgErro = $e->getMessage();
        }

    }

    public function cadastrar($nome, $cpf, $rg, $dataN, $profissao, 
                                $logadouro, $numero, $bairro, $cidade, $cep, $uf, 
                                    $telefone, $celular, $email, $dataC)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id_paciente FROM tb_paciente WHERE cpf_paciente = :cpf");
        $sql->bindValue(":cpf",$cpf);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        }else{

        //caso não, cadastrar
        $sql = $pdo->prepare("INSERT INTO tb_paciente (nome_paciente, cpf_paciente, rg_paciente, dt_nasc_paciente, profissao_paciente, logadouro_paciente, numero_paciente, bairro_paciente, cidade_paciente, cep_paciente, uf_paciente, telefone_paciente, celular_paciente, email_paciente, dt_cad_paciente) 
            VALUES (:nome, :cpf, :rg, :dataN, :profissao, :logadouro, :numero, :bairro, :cidade, :cep, :uf, :telefone, :celular, :email, :dataC)");
        $sql->bindValue(":nome",$nome);
        $sql->bindValue(":cpf",$cpf);
        $sql->bindValue(":rg",$rg);
        $sql->bindValue(":dataN",$dataN);
        $sql->bindValue(":profissao",$profissao);
        $sql->bindValue(":logadouro",$logadouro);
        $sql->bindValue(":numero",$numero);
        $sql->bindValue(":bairro",$bairro);
        $sql->bindValue(":cidade",$cidade);
        $sql->bindValue(":cep",$cep);
        $sql->bindValue(":uf",$uf);
        $sql->bindValue(":telefone",$telefone);
        $sql->bindValue(":celular",$celular);
        $sql->bindValue(":email",$email);
        $sql->bindValue(":dataC",$dataC);
        $sql->execute();
        return true;
        }
    }

}*/
?>  

    <?php/*
          $paciente = new Paciente;
     //verifica se clicou no botão
      if(isset($_POST['nome_paciente']))
      {
        //addslashes impede comandos maliciosos para hackear sites
        $nome = addslashes($_POST["nome_paciente"]);
        $cpf = addslashes($_POST["cpf_paciente"]);
        $rg = addslashes($_POST["rg_paciente"]);
        $dataN = addslashes($_POST["dt_nasc_paciente"]);
        $profissao = addslashes($_POST["profissao_paciente"]);
        $logadouro = addslashes($_POST["logadouro_paciente"]);
        $numero = addslashes($_POST["numero_paciente"]);
        $bairro = addslashes($_POST["bairro_paciente"]);
        $cidade = addslashes($_POST["cidade_paciente"]);
        $cep = addslashes($_POST["cep_paciente"]);
        $uf = addslashes($_POST["uf_paciente"]);
        $telefone = addslashes($_POST["telefone_paciente"]);
        $celular = addslashes($_POST["celular_paciente"]);
        $email = addslashes($_POST["email_paciente"]);
        $dataC = addslashes($_POST["dt_cad_paciente"]);
      
        //verifica se está preenchido
        if(!empty($nome) && !empty($cpf) && !empty($rg) && !empty($dataN) 
            && !empty($profissao) && !empty($logadouro) && !empty($numero) 
            && !empty($bairro) && !empty($cidade) && !empty($cep) 
            && !empty($uf) && !empty($telefone) && !empty($celular) 
            && !empty($email) && !empty($dataC))
        {
          //conexão com o banco e verificação/exibição de msg erro/confirmação
          $paciente->conectar("mdata","localhost","root","");
          //variável msgErro está na classe Usuario
          if($paciente->msgErro == "")
          {

            if($paciente->cadastrar($nome, $cpf, $rg, $dataN, $profissao, 
                                      $logadouro, $numero, $bairro, $cidade, $cep, $uf, 
                                          $telefone, $celular, $email, $dataC))
            {
              ?>
              <script type="text/javascript">location.replace("listaPaciente.php")</script>
              <?php
            }
            else
            {
              ?>
                <div class="msg-erro">
                  Paciente já cadastrado!
                </div>
              <?php
            }
          }
        }
        else
        {
          ?>
            <div class="msg-erro">
              <?php echo "Erro: ".$paciente->msgErro; ?>
            </div>
          <?php
        }
      }*/
    ?>