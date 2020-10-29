<?php

include "connection.php";
include "User.php";

try {
    $conexao = new Connection("localhost", "root", "", "bdcasa");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT cli_email, cli_senha FROM tbl_cliente WHERE cli_email = '$email' AND cli_senha = '$password'";

    foreach ($conexao->_conn->query($sql) as $row) {
        if ($row['cli_email'] === '' && $row['cli_senha'] === ''){
            echo 'cadastre-se!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
        }
        else{
            echo  $row['cli_email'] . "<br>";
            echo  $row['cli_senha'] . "<br>";
        }

    }
    
    
} catch (PDOException $e) {
    echo "Problemas no login.<br>$sql<br>$e->getMessage()";
}
