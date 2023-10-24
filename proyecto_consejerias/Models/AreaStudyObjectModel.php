<?php
    class AreaStudyObjectModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubjectByOR(int $codeOR){
            $querySelect = "SELECT rc.nombre AS name_component,        
            rhc.descripcion AS name_object,        
            count(*) as count
            FROM res_asignacion_objetos_de_estudio rahc
            INNER JOIN res_espacio re ON rahc.codigo_espacio = re.codigo
            INNER JOIN res_componente rc ON re.codigo_componente = rc.codigo
            INNER JOIN res_objetos_de_estudio rhc ON rahc.codigo_objetos_de_estudio = rhc.codigo 
            WHERE rc.codigo = ".$codeOR."  
            group by rhc.descripcion  
            order by name_component, count DESC;";

            $request = $this->selectAll($querySelect);
            return $request;
        }
       
    }
?>

