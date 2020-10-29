<?php

class User{

    private $name;
    private $cpf;
    private $address;
    private $cep;
	private $email;
	private $phone;
	private $password;

	function __construct($name,$cpf,$address,$cep,$email,$password,$phone){
		$this->name = $name;
		$this->cpf = $cpf;
		$this->address = $address;
		$this->cep = $cep;
		$this->email = $email;
		$this->password = $password;
		$this->phone = $phone;
	}
	
	function get_name(){
		return $this->name;
	}

	function get_cpf(){
		return $this->cpf;
	}

	function get_address(){
		return $this->address;
	}
	function get_cep(){
		return $this->cep;
	}
	function get_email(){
		return $this->email;
	}
	function get_password(){
		return $this->password;
	}
	function get_phone(){
		return $this->phone;
	}
}




 
