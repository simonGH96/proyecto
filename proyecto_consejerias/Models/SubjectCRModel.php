<?php
    class SubjectCRModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, nombre FROM res_espacio";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchCRTitleById(int $codeCR){
            $querySelect = "SELECT nombre FROM res_herramientas_conceptuales WHERE codigo = $codeCR";
            $request = $this->select($querySelect);
            return $request;
            // return $querySelect;
        }

        public function searchAllSubjectByCR(int $codeCR){
            $querySelect = "SELECT esp.codigo, esp.nombre AS name_subject, prof.nombre AS name_teacher, prof.apellido AS lastname_teacher
                            FROM res_asignacion_herramientas_conceptuales ara
                            INNER JOIN res_espacio esp ON ara.codigo_espacio = esp.codigo
                            INNER JOIN res_profesor prof ON ara.codigo_profesor = prof.codigo
                            INNER JOIN res_herramientas_conceptuales rc ON ara.codigo_herramientas_conceptuales = rc.codigo 
                            WHERE rc.codigo = $codeCR;";
            $request = $this->selectAll($querySelect);
            return $request;
        }


    }
?>