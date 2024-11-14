<?php

    $servidor = 'izm96dhhnwr2ieg0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306'; // ou o endereço do seu servidor de banco de dados
    $usuario = 'hov9byvj7u6tdy6x'; // seu usuário do MySQL
    $senha = 'yd785ippneanbe8w'; // sua senha do MySQL
    $dbname = 'mrrrh8fsanxe85db'; // o nome do seu banco de dados

    // Cria a conexão
    $conexao = new mysqli($servidor, $usuario, $senha, $dbname);

    // Verifica a conexão
    if ($conexao->connect_error) {
      echo "Falha ao se Conectar: ";
    }
    else
    {
        echo "";
    }
?>