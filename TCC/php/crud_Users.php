<?php

include "connection.php";
include "User.php";

try {
    $conexao = new Connection("localhost", "root", "", "casabd");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $acao = $_POST["acao"];

    if ($acao == "criar") {

        $user = set_user();

        $cpf = $user->get_cpf();
        $name = $user->get_name();
        $email = $user->get_email();
        $password = $user->get_password();
        $cep = $user->get_cep();
        $address = $user->get_address();
        $phone = $user->get_phone();

        $sql = "INSERT INTO tbl_cliente(cli_cpf, cli_nome, cli_email, cli_senha, cli_cep, cli_end,cli_tel)
            VALUES('$cpf', '$name', '$email', '$password', '$cep', '$address', $phone)";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "atualizar") {

        $user = set_user();

        $cpf = $user->get_cpf();
        $name = $user->get_name();
        $email = $user->get_email();
        $password = $user->get_password();
        $cep = $user->get_cep();
        $address = $user->get_address();
        $phone = $user->get_phone();

        $sql = "UPDATE tbl_cliente
                SET cli_nome = '$name', cli_email = '$email', cli_senha = '$password', cli_cep = '$cep', cli_end = '$address', cli_tel = '$phone')
                WHERE cli_cpf = $cpf";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "excluir") {

        $numero = $_POST["numero"];

        $sql = "DELETE FROM contas
                WHERE cli_cpf = $cpf";
        $conexao->_conn->exec($sql);

        end_process();
    }
} catch (PDOException $e) {
    echo "Problemas na inserção.<br>$sql<br>$e->getMessage()";
}

function set_user()
{
    $user = new User($_POST["fname"], $_POST["cpf"], $_POST["address"], $_POST["cep"], $_POST["email"], md5($_POST["password"]), $_POST["phone"]);
    return $user;
}

function end_process()
{
    global $conexao;
    $conexao->close_connection();
    header("Location: ../Index.html");
    die();
}
