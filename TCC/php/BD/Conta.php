<?php


class Conta{

	private $numero;
	protected $saldo;
	private $titular;

	function __construct($numero, $titular){

		if ($numero > 999){
			$this->numero = $numero;
		}
		$this->titular = $titular;
	}

	function get_saldo(){

		return $this->saldo;
	}

	function get_numero(){

		return $this->numero;
	}
	function get_titular(){

		return $this->titular;
	}
	function depositar($valor){

		if ($valor > 0) {
			$this->saldo += $valor;	
		}
	}
	
	function sacar($valor){

		if ($valor > 0){
			$valor = $valor + 0.10;
			$this->saldo -= $valor;
		}
	}

	function transferir($valor){
		if ($valor > 0){
			$this->saldo -= $valor;
		}
	}
}
?>

