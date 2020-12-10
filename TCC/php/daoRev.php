<?php

include "connection.php";
include "Reserva.php";

class Dao{

    private $conexao;

    public function __construct()
    {
        
        try {
            
            $this->conexao = new Connection("localhost","root","","casabd");
            $this->conexao->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
           
            echo "Problemas na conexão.<br/>$e->getMessage()";
        }
    }

    public function get_all()
    {
        $sql = "SELECT * FROM tbl_reserva";
        $stmt = $this->conexao->_conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function get_by_id($codRev)
    {
        $sql = "SELECT * FROM tbl_reserva WHERE rev_cod = $codRev";
        $stmt = $this->conexao->_conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchObject(__CLASS__);
        return $result;
    }
}