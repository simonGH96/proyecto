<?php
    class ConceptualResultModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }
        
        public function searchAllConceptualResult($offset){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales LIMIT 12 OFFSET $offset";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAllConceptualResultSelect(){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchConceptualResultById(int $id){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales WHERE codigo = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchConceptualResultAmount(){
            $querySelect = "SELECT count(codigo) AS amount FROM res_herramientas_conceptuales";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchLastCode(){
            $querySelect = "SELECT max(codigo) AS code FROM res_herramientas_conceptuales";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchBarConceptualQuery(string $words){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales 
                            WHERE nombre LIKE '%$words%' 
                            OR detalle LIKE '%$words%'";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>