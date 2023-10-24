<?php
    class SubjectCRBModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, nombre FROM res_herramientas_conceptuales";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchCRTitleById(int $codeCR){
            $querySelect = "SELECT nombre FROM res_componente WHERE codigo = $codeCR";
            $request = $this->select($querySelect);
            return $request;
        }

    }
?>