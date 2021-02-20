<?php
// realiza conexao com o banco de dados. 
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'dados';
    $conn = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Não foi possivel realizar a conexão');


?>