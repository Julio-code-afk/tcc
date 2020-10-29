<?php

include "connection.php";
include "User.php";

try {
    $conexao = new Connection("localhost", "root", "", "bdcasa");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = new User($_POST["fname"], $_POST["cpf"], $_POST["address"], $_POST["cep"], $_POST["email"], $_POST["password"], $_POST["phone"]);


    $cpf = $user->get_cpf();
    $name = $user->get_name();
    $email = $user->get_email();
    $password = $user->get_password();
    $cep = $user->get_cep();
    $address = $user->get_address();
    $phone = $user->get_phone();


    $sql = " 
        INSERT INTO tbl_cliente(
        cli_cpf, 
        cli_nome, 
        cli_email, 
        cli_senha, 
        cli_cep, 
        cli_end, 
        cli_tel
        )
            values('$cpf', '$name', '$email', '$password', '$cep', '$address', $phone)";
    $conexao->_conn->exec($sql);
    echo "Registro inserido com sucesso!";
} catch (PDOException $e) {
    echo "Problemas na inserção.<br>$sql<br>$e->getMessage()";
}
