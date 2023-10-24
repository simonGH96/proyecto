<?php
    class EgreListModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }


        public function searchAllSubjectByCR(int $codeCR){
            $querySelect = "SELECT res_categorias_cargos.nombre AS name_component, res_egresados.title AS name_tools_conceptual, res_egresados.Company as count  
            FROM res_egresados, res_categorias_cargos 
            WHERE res_categorias_cargos.codigo = res_egresados.cargos_egresados 
            and res_categorias_cargos.codigo = ".$codeCR.";";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAllSubjectByCR1(int $codeCR){
            $querySelect = "SELECT res_categorias_cargos.nombre AS name_component, res_egresados.title AS name_tools_conceptual, count(*) as count  
            FROM res_egresados, res_categorias_cargos 
            WHERE res_categorias_cargos.codigo = res_egresados.cargos_egresados 
            group BY res_categorias_cargos.codigo 
            ORDER by count(*) DESC;";
            $request = $this->selectAll($querySelect);
            return $request;
        }


        public function searchAllSubjectByCR2(int $codeCR){
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