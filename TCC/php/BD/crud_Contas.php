<?php

include "connection.php";
include "Conta.php";

try{
    $conexao = new Connection("localhost", "root", "", "bancoDB");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $acao = $_POST["acao"];

    if ($acao == "criar") {
        
        $conta = set_conta();

        $numero = $conta->get_numero();
        $saldo = $conta->get_saldo();
        $titular = $conta->get_titular();
        
        $sql = "INSERT INTO contas(numero, saldo, titular)
                VALUES($numero, $saldo, '$titular')";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "atualizar") {
               
        $conta = set_conta();

        $numero = $conta->get_numero();
        $saldo = $conta->get_saldo();
        $titular = $conta->get_titular();
        
        $sql = "UPDATE contas
                SET saldo = $saldo, titular = '$titular'
                WHERE numero = $numero";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "excluir") {

        $numero = $_POST["numero"];

        $sql = "DELETE FROM contas
                WHERE numero = $numero";
        $conexao->_conn->exec($sql);

        end_process();
    }
}catch (PDOException $e){
    echo "Problemas na inserção.<br>$sql<br>$e->getMessage()";

}

function set_conta(){
    $conta = new Conta($_POST["txtNumero"], $_POST["txtTitular"]);
    $conta->depositar($_POST["txtSaldo"]);
    return $conta;
}

function end_process(){
    global $conexao;
    $conexao->close_connection();
    header("Location: ./contas_list.php");
    die();
}