<?php
    class TarefaService{
        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa){ 
            //Definindo a tipagem do dado que vira, somente sera aceito caso ele seja da respectiva classe.
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function insert(){
            $sqlQuery = " INSERT INTO tb_tarefas ";
            $sqlQuery .= " (ds_tarefa) values (:ds_tarefa) ";
            $stmt = $this->conexao->prepare($sqlQuery);
            $stmt->bindValue(":ds_tarefa", $this->tarefa->__get("ds_tarefa"));

            return $stmt->execute();
        }

        public function delet(){
            $sqlQuery = "DELETE FROM tb_tarefas WHERE cd_tarefa =  '{$this->tarefa->__get("cd_tarefa")}' ";
            $stmt = $this->conexao->prepare($sqlQuery);

            return $stmt->execute();
        
        }

        public function update(){

            $sqlQuery = " UPDATE tb_tarefas SET ";
            $sqlQuery .= " ds_tarefa = :ds_tarefa ";
            $sqlQuery .= " WHERE cd_tarefa = :cd_tarefa ";
            $stmt = $this->conexao->prepare($sqlQuery);
            $stmt->bindValue(":ds_tarefa", $this->tarefa->__get("ds_tarefa"));
            $stmt->bindValue(":cd_tarefa", $this->tarefa->__get("cd_tarefa"));

            return $stmt->execute();
        
        }

        public function select(){
            $sqlQuery = " SELECT * FROM tb_tarefas JOIN tb_status using(cd_status) ORDER BY  cd_status ASC, cd_tarefa DESC";
            $stmt = $this->conexao->prepare($sqlQuery);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function selectPendete(){
            $sqlQuery = " SELECT * FROM tb_tarefas ";
            $sqlQuery .= " JOIN tb_status using(cd_status)";
            $sqlQuery .= " WHERE cd_status = '1'  ORDER BY cd_tarefa DESC ";
            $stmt = $this->conexao->prepare($sqlQuery);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        }

        public function atualizaStatus(){
            $sqlQuery = " UPDATE tb_tarefas SET cd_status = '{$this->tarefa->__get("cd_status")}' WHERE cd_tarefa = '{$this->tarefa->__get("cd_tarefa")}' ";
            $stmt = $this->conexao->prepare($sqlQuery);

            return $stmt->execute();

        }
    }
?>