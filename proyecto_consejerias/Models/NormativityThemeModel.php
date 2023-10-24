<?php
    class NormativityThemeModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }


        public function searchAllSubjectByCR($codeCR){
            $querySelect = "select t1.numero_norma as campo1, t2.nombre as campo2, t1.tema as campo3, t1.fecha_inicio as campo4
            from res_normas as t1, res_tipo_norma as t2
            where t1.tipo_norma = t2.codigo and t1.tema like '%".$codeCR."%';";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAllSubjectByCR1(int $codeCR){
            $querySelect = "SELECT rc.nombre AS name_component,        
            rhc.nombre AS name_tools_conceptual,        
            count(*) as count
            FROM res_asignacion_herramientas_conceptuales rahc
            INNER JOIN res_espacio re ON rahc.codigo_espacio = re.codigo
            INNER JOIN res_componente rc ON re.codigo_componente = rc.codigo
            INNER JOIN res_herramientas_conceptuales rhc ON rahc.codigo_herramientas_conceptuales = rhc.codigo 
            WHERE rc.codigo = ".$codeCR.";";

            $request = $this->selectAll($querySelect);
            return $request;
        }
       
    }
?>