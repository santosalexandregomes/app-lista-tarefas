<?php
    class Tarefa{
        private $cd_tarefa;
        private $cd_status;
        private $ds_tarefa;
        private $dt_tarefa;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }
?>