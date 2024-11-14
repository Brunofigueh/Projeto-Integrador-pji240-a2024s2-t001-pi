<?php

    $servidor = 'localhosthttps://pji240-a2024s2-t001-pi-f1d850c98e99.herokuapp.com/'; // ou o endereço do seu servidor de banco de dados
    $usuario = 'root'; // seu usuário do MySQL
    $senha = ''; // sua senha do MySQL
    $dbname = 'cadastro'; // o nome do seu banco de dados

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