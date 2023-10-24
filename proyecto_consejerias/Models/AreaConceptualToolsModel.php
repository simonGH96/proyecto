<?php
    class AreaConceptualToolsModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubjectByCR(int $codeCR){
            $querySelect = "SELECT rc.nombre AS name_component,        
            rhc.nombre AS name_tools_conceptual,        
            count(*) as count
            FROM res_asignacion_herramientas_conceptuales rahc
            INNER JOIN res_espacio re ON rahc.codigo_espacio = re.codigo
            INNER JOIN res_componente rc ON re.codigo_componente = rc.codigo
            INNER JOIN res_herramientas_conceptuales rhc ON rahc.codigo_herramientas_conceptuales = rhc.codigo 
            WHERE rc.codigo = ".$codeCR."  
            group by rhc.nombre  
            order by name_component, count DESC;";

            $request = $this->selectAll($querySelect);
            return $request;
        }
       
    }
?>