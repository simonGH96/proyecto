<?php
    class SubjectLRBModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, descripcion FROM res_resultados_de_aprendizaje";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchCRTitleById(int $codeLR){
            $querySelect = "SELECT nombre FROM res_componente WHERE codigo = $codeLR";
            $request = $this->select($querySelect);
            return $request;
        }

    }
?>