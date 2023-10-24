<?php
    class SubjectTRBModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, descripcion FROM res_pensamiento";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchCRTitleById(int $codeTR){
            $querySelect = "SELECT nombre FROM res_componente WHERE codigo = $codeTR";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchAllSubjectByThinking(int $codeTR){
            $querySelect = "SELECT rc.codigo as code_component, 
            rc.nombre AS name_component,        
            rhc.descripcion AS name_thinking, 
            count(*) as count
            FROM res_asignacion_pensamiento rahc
            INNER JOIN res_espacio re ON rahc.codigo_espacio = re.codigo
            INNER JOIN res_componente rc ON re.codigo_componente = rc.codigo
            INNER JOIN res_pensamiento rhc ON rahc.codigo_pensamiento = rhc.codigo 
            WHERE rc.codigo = ".$codeTR."  
            group by rhc.descripcion  
            order by name_component, count DESC;";

            $request = $this->selectAll($querySelect);
            return $request;
        }


    }
?>