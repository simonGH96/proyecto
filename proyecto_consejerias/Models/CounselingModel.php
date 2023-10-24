<?php
    class CounselingModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }
        
        public function searchAllCounseling($offset){
            $querySelect = "SELECT * FROM counseling LIMIT 12 OFFSET $offset";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAllCounselingSelect(){
            $querySelect = "SELECT * FROM res_counseling";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchCounselingById(int $id){
            $querySelect = "SELECT * FROM res_counseling WHERE codigo = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchCounselingAmount(){
            $querySelect = "SELECT count(codigo) AS amount FROM res_counseling";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchLastCode(){
            $querySelect = "SELECT max(codigo) AS code FROM res_counseling";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchBarCounselingQuery(string $words){
            $querySelect = "SELECT * FROM res_counseling 
                            WHERE nombre LIKE '%$words%' 
                            OR detalle LIKE '%$words%'";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>