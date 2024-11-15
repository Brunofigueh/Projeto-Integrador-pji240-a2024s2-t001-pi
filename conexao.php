<?php

    $servidor = $_ENV['server_var']; // ou o endereço do seu servidor de banco de dados
    $usuario = $_ENV['user_var']; // seu usuário do MySQL
    $senha = $_ENV['db_acess']; // sua senha do MySQL
    $dbname = $_ENV['db_name']; // o nome do seu banco de dados

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