<?php
    class SubjectTRModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, nombre FROM res_pensamiento";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchTRTitleById(int $codeLR){
            $querySelect = "SELECT descripcion FROM res_pensamiento WHERE codigo = $codeLR";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchAllSubjectByTR(int $codeOR){
            $querySelect = "SELECT esp.codigo, esp.nombre AS name_subject, prof.nombre AS name_teacher, prof.apellido AS lastname_teacher
                            FROM res_asignacion_pensamiento aoe
                            INNER JOIN res_espacio esp ON aoe.codigo_espacio = esp.codigo
                            INNER JOIN res_profesor prof ON aoe.codigo_profesor = prof.codigo
                            INNER JOIN res_pensamiento oe ON aoe.codigo_pensamiento = oe.codigo  
                            WHERE oe.codigo = $codeOR;";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>