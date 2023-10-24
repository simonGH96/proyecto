<?php
    class SubjectORModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAllSubject(){
            $querySelect = "SELECT codigo, nombre FROM res_espacio";
            $request = $this->selectAll($querySelect);
            return $request;
        }

	public function searchORTitleById(int $codeLR){
            $querySelect = "SELECT descripcion FROM res_objetos_de_estudio WHERE codigo = $codeLR";
            // echo "SOY YO SQL ".$querySelect. " SQL";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchAllSubjectByOR(int $codeOR){
            $querySelect = "SELECT esp.codigo, esp.nombre AS name_subject, prof.nombre AS name_teacher, prof.apellido AS lastname_teacher
                            FROM res_asignacion_objetos_de_estudio aoe
                            INNER JOIN res_espacio esp ON aoe.codigo_espacio = esp.codigo
                            INNER JOIN res_profesor prof ON aoe.codigo_profesor = prof.codigo
                            INNER JOIN res_objetos_de_estudio oe ON aoe.codigo_objetos_de_estudio = oe.codigo  
                            WHERE oe.codigo = $codeOR;";
            $request = $this->selectAll($querySelect);
            return $request;
        }
    }
?>