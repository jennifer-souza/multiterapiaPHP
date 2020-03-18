<?php

Class profissional{
id_profissional                    

    public function cadastrar($nome, $crm, $cpf, $rg, $email, $celular, $area, $dtCad)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id_profissional FROM tb_profissional WHERE email_profissional = :em");
        $sql->bindValue(":em",$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        }else{
        //caso não, cadastrar
        $sql = $pdo->prepare("INSERT INTO tb_profissional (nome_profissional, crm_profissional, cpf_profissional, rg_profissional, email_profissional, celular_profissional, area_profissional, dt_cad_profissional) 
            VALUES (:n, :cr, :cpf, :rg, :em, :cel, :area, :dt)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":cr",$crm);
        $sql->bindValue(":cpf",$cpf);
        $sql->bindValue(":rg",$rg);
        $sql->bindValue(":em",$email);
        $sql->bindValue(":cel",$celular);
        $sql->bindValue(":area",$area);
        $sql->bindValue(":dtcad",$dtCad);
        $sql->execute();
        return true;
        }
    }
}

?>