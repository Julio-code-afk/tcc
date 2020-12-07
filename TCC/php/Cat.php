<?php

    class Cat{

        private $img;
        private $type;
        private $price;
        private $cod;
        private $qtd;
        private $desc;

        function __construct($img, $type, $price, $cod, $qtd, $desc){
            $this->img = $img;
            $this->type = $type;
            $this->price = $price;
            $this->cod = $cod;
            $this->qtd = $qtd;
            $this->desc = $desc;

        }

        function get_img(){
            return $this->img;
        }

        function get_type(){
            return $this->type;
        }

        function get_price(){
            return $this->price;
        }

        function get_cod(){
            return $this->cod;
        }

        function get_qtd(){
            return $this->qtd;
        }

        function get_desc(){
            return $this->desc;
        }

    }


