<?php 

    Class paciente
    {
        public function cadastrar($nome, $crm, $celular, $email, $senha)
        {
            global $pdo;
            //verificar se já existe email cadastrado
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email_usuario = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();
            if($sql->rowCount() > 0){
                return false;
            }else{
            //caso não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome_usuario, crm_usuario, cel_usuario, email_usuario, senha_usuario) 
                VALUES (:n, :cr, :c, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":cr",$crm);
            $sql->bindValue(":c",$celular);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
            }
        }
    }
?>