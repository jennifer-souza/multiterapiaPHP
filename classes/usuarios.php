<?php

Class Usuario
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

    public function logar($email, $senha)
    {
        global $pdo;
        
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios 
            WHERE email_usuario = :e AND senha_usuario = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;
        }
        else
        {
            return false;
        }

    }
}
?>