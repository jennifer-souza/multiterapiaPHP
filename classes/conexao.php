<?php

    $servidor = "localhost";
    $banco = "multiterapiabd";
    $usuario = "root";
    $senha = "";
	$link = mysqli_connect($servidor, $usuario, $senha, $banco) or die('Não foi possível conectar ao banco' . msqli_error($link));
?>