<?php

include "./connection.php";
include "Montagem.php";

try {
    $conexao = new Connection("localhost", "root", "", "casabd");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $acao = $_POST["acao"];

    if ($acao == "criar_montagem") {

        $mon = set_mon();

        $rev_cod = $mon-> get_rev_cod();
        $mon_data_prev = $mon->get_mon_data_prev();


        $sql = "INSERT INTO tbl_montagem(
            rev_cod,
            mon_data_prev
            )
                VALUES(
            $rev_cod, 
            '$mon_data_prev'
            )";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "atualizar_montagem") {

        $mon = set_mon();

        $rev_cod = $mon-> get_rev_cod();
        $mon_data_prev = $mon->get_mon_data_prev();

        $codMon = $_POST["codMon"];

        $sql = "UPDATE tbl_montagem
                SET rev_cod = $rev_cod, mon_data_prev = '$mon_data_prev'
                WHERE mon_cod = $codMon";

        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "excluir_montagem") {

        $codMon = $_POST["codMon"];

        $sql = "DELETE FROM tbl_montagem
                WHERE mon_cod = $codMon";
        $conexao->_conn->exec($sql);

        end_process();
    }
} catch (PDOException $e) {
    echo "Problemas na inserção.<br>$sql<br>$e->getMessage()";
}

function set_mon()
{
    $mon = new Montagem($_POST["rev_cod"], $_POST["mon_data_prev"]);
    return $mon;
}

function end_process()
{
    global $conexao;
    $conexao->close_connection();
    header("Location: ../Interface_Cliente_Montagem.php");
    die();
}
