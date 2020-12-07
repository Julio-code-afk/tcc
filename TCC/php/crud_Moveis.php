<?php

include "connection.php";
include "Cat.php";

try {
    $conexao = new Connection("localhost", "root", "", "casabd");
    $conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $acao = $_POST["acao"];

    if ($acao == "criar_mov") {

        $cat = set_mov();

        $img = $cat->get_img();
        $type = $cat->get_type();
        $price = $cat->get_price();
        $cod = $cat->get_cod();
        $qtd = $cat->get_qtd();
        $desc = $cat->get_desc();

        $sql = "INSERT INTO tbl_moveis(
            mov_img, 
            cat_cod, 
            mov_price, 
            mov_cod, 
            mov_qtd , 
            mov_desc 
            )
                VALUES(
            '$img', 
            '$type', 
             $price, 
             $cod, 
             $qtd, 
            '$desc'
            )";
        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "atualizar_mov") {

        $cat = set_mov();

        $img = $cat->get_img();
        $type = $cat->get_type();
        $price = $cat->get_price();
        $cod = $cat->get_cod();
        $qtd = $cat->get_qtd();
        $desc = $cat->get_desc();

        $sql = "UPDATE tbl_moveis
                SET mov_img = '$img',  cat_cod = '$type', mov_price = $price, mov_qtd = $qtd, mov_desc = '$desc'
                WHERE mov_cod = $cod";

        $conexao->_conn->exec($sql);

        end_process();
    }

    if ($acao == "excluir_mov") {

        $cod = $_POST["cod"];

        $sql = "DELETE FROM tbl_moveis
                WHERE mov_cod = $cod";
        $conexao->_conn->exec($sql);

        end_process();
    }
} catch (PDOException $e) {
    echo "Problemas na inserção.<br>$sql<br>$e->getMessage()";
}

function set_mov()
{
    $cat = new Cat($_POST["img"], $_POST["type"], $_POST["price"], $_POST["cod"], $_POST["qtd"], $_POST["desc"]);
    return $cat;
}

function end_process()
{
    global $conexao;
    $conexao->close_connection();
    header("Location: ../Interface_Funcionário_Catálogo.html");
    die();
}
