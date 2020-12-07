<?php
class Connection{
    
    private $_servername;
    private $_username;
    private $_password;
    private $_dbname;

    public $_conn;

    function __construct($server, $user, $passwd, $db){

        $this->_servername = $server;
        $this->_username = $user;
        $this->_password = $passwd;
        $this->_dbname = $db;
    
//criar conexao
        try {
            $this->_conn = new PDO("mysql:host=$this->_servername;dbname=$this->_dbname", $this->_username, $this->_password);
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão realizada com sucesso!";
        } catch 
            (PDOException $e){
            echo "Falha na conexão :( <br>";
            echo "Erro encontrado: " . $e->getMessage();
        }
   
    }
        public function Connected(){
            return $this->_conn ? $this->_conn : null;
    }

    public function close_connection(){
        $this->_conn = null;
    }
}