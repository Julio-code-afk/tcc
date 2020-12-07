<?php

include "connection.php";
include "User.php";

class Dao{

    private $conexao;

    public function __construct()
    {
        
        try {
            
            $this->conexao = new Connection("localhost","root","","bdcasa");
            $this->conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
           
            echo "Problemas na conexão.<br/>$e->getMessage()";
        }
    }

    public function get_all()
    {
        $sql = "SELECT * FROM tbl_cliente";
        $stmt = $this->conexao->_conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT * FROM tbl_cliente WHERE numero = $id";
        $stmt = $this->conexao->_conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchObject(__CLASS__);
        return $result;
    }
}