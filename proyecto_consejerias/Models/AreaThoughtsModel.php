<?php
    class AreaThoughtsModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubjectByThinking(int $codeTR){
            $querySelect = "SELECT rc.nombre AS name_component,        
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

