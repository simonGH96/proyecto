<?php
    class AreaResourceModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubjectByRR(int $codeRR){
            $querySelect = "SELECT rc.nombre AS name_component,        
            rhc.descripcion AS name_resource, 
            count(*) as count
            FROM res_asignacion_recursos rahc
            INNER JOIN res_espacio re ON rahc.codigo_espacio = re.codigo
            INNER JOIN res_componente rc ON re.codigo_componente = rc.codigo
            INNER JOIN res_recursos rhc ON rahc.codigo_recursos = rhc.codigo 
            WHERE rc.codigo = ".$codeRR."  
            group by rhc.descripcion  
            order by name_component, count DESC;";

            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>