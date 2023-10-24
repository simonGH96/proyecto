<?php
    class SubjectORBModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, descripcion FROM res_objetos_de_estudio";
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