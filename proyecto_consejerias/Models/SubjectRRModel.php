<?php
    class SubjectRRModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, nombre FROM res_recursos";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchRRTitleById(int $codeRR){
            $querySelect = "SELECT descripcion FROM res_recursos WHERE codigo = $codeRR";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchAllSubjectByRR(int $codeRR){
            $querySelect = "SELECT esp.codigo, esp.nombre AS name_subject, prof.nombre AS name_teacher, prof.apellido AS lastname_teacher
                            FROM res_asignacion_recursos aoe
                            INNER JOIN res_espacio esp ON aoe.codigo_espacio = esp.codigo
                            INNER JOIN res_profesor prof ON aoe.codigo_profesor = prof.codigo
                            INNER JOIN res_recursos oe ON aoe.codigo_recursos = oe.codigo  
                            WHERE oe.codigo = $codeRR;";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>