<?php
    class SubjectRRBModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, descripcion FROM res_recursos";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchCRTitleById(int $codeRR){
            $querySelect = "SELECT nombre FROM res_componente WHERE codigo = $codeRR";
            $request = $this->select($querySelect);
            return $request;
        }


    }
?>