<?php

    class Montagem{

        private $rev_cod;
        private $mon_data_prev;

        function __construct($rev_cod, $mon_data_prev){
            $this->rev_cod = $rev_cod;
            $this->mon_data_prev = $mon_data_prev;
        }

        function get_rev_cod(){
            return $this->rev_cod;
        }
        function get_mon_data_prev(){
            return $this->mon_data_prev;
        }
    }

