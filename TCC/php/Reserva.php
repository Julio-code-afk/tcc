<?php

    class Reserva{

       private $cod;
       private $cpf;
       private $rev_data;

       function __construct($cod, $cpf, $rev_data){
           $this->cod = $cod;
           $this->cpf = $cpf;
           $this->rev_data = $rev_data;
       }

       function get_cod(){
           return $this->cod;
       }
       function get_cpf(){
           return $this->cpf;
       }
       function get_rev_data(){
           return $this->rev_data;
       }

    }