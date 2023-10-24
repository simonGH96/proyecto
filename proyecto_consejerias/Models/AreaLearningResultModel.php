<?php
    class AreaLearningResultModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubjectByLR(int $codeLR){
            $querySelect = "SELECT rc.nombre AS name_component,        
            rhc.descripcion AS name_tools_learning,        
            count(*) as count
            FROM res_asignacion_resultados_de_aprendizaje rahc
            INNER JOIN res_espacio re ON rahc.codigo_espacio = re.codigo
            INNER JOIN res_componente rc ON re.codigo_componente = rc.codigo
            INNER JOIN res_resultados_de_aprendizaje rhc ON rahc.codigo_resultados = rhc.codigo 
            WHERE rc.codigo = ".$codeLR."  
            group by rhc.descripcion  
            order by name_component, count DESC;";

            $request = $this->selectAll($querySelect);
            return $request;
        }
       
    }
?>