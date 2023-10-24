<?php
    class ThinkingResultModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }
        
        public function searchAllThinkingResult($offset){
            $querySelect = "SELECT * FROM res_pensamiento LIMIT 12 OFFSET $offset";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAllThinkingResultSelect(){
            $querySelect = "SELECT * FROM res_pensamiento";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchThinkingResultById(int $id){
            $querySelect = "SELECT * FROM res_pensamiento WHERE codigo = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchThinkingResultAmount(){
            $querySelect = "SELECT count(codigo) AS amount FROM res_pensamiento";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchLastCodeThinking(){
            $querySelect = "SELECT max(codigo) AS code FROM res_pensamiento";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchBarThinkingQuery(string $words){
            $querySelect = "SELECT * FROM res_pensamiento 
                            WHERE descripcion LIKE '%$words%' 
                            OR detalle LIKE '%$words%'";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>