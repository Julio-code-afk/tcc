<?php

include "connection.php";
include "Reserva.php";

try {
    $conexao = new Connection("localhost", "root", "", "casabd");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $acao = $_POST["acao"];

    if ($acao == "criar_reserva") {

        $reserva = set_res();

        $cod = $reserva->get_cod();
        $cpf = $reserva->get_cpf();
        $rev_data = $reserva->get_rev_data();

        $sql = "INSERT INTO tbl_reserva(mov_cod, cli_cpf, rev_data)
            VALUES($cod, '$cpf', '$rev_data')";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "atualizar") {

        $reserva = set_res();

        $cod = $reserva->get_cod();
        $cpf = $reserva->get_cpf();
        $rev_data = $reserva->get_rev_data();

        $codRev = $_POST["codRev"];

        $sql = "UPDATE tbl_reserva
                SET mov_cod = $cod, cli_cpf = '$cpf', rev_data = '$rev_data'
                WHERE rev_cod = $codRev";

        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "excluir") {

        $cod = $_POST["cod"];

        $sql = "DELETE FROM tbl_reserva
                WHERE rev_cod = $cod";
        $conexao->_conn->exec($sql);

        end_process();
    }
} catch (PDOException $e) {
    echo "Problemas na inserção.<br>$sql<br>$e->getMessage()";
}

function set_res()
{
    $reserva = new Reserva($_POST["cod"], $_POST["cpf"], $_POST["rev_data"]);
    return $reserva;
}

function end_process()
{
    global $conexao;
    $conexao->close_connection();
    header("Location: ../Interface_Funcionário_Reservas.php");
    die();
}
