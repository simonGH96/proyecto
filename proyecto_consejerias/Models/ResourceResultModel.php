<?php
    class ResourceResultModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }
        
        public function searchAllResourceResult($offset){
            $querySelect = "SELECT * FROM res_recursos LIMIT 12 OFFSET $offset";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAllResourceResultSelect(){
            $querySelect = "SELECT * FROM res_recursos";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchResourceResultById(int $id){
            $querySelect = "SELECT * FROM res_recursos WHERE codigo = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchResourceResultAmount(){
            $querySelect = "SELECT count(codigo) AS amount FROM res_recursos";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchLastCode(){
            $querySelect = "SELECT max(codigo) AS code FROM res_recursos";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchBarResourceQuery(string $words){
            $querySelect = "SELECT * FROM res_recursos 
                            WHERE nombre LIKE '%$words%' 
                            OR detalle LIKE '%$words%'";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>