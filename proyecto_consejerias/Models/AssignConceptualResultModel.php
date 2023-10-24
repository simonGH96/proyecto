<?php
    class AssignConceptualResultModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function searchAssignConceptualResultById(int $id){
            $querySelect = "SELECT prof.nombre AS teacher_name, prof.apellido AS teacher_lastname,
            esp.nombre AS academic_area 
            FROM res_asignacion_herramientas_conceptuales aca
            LEFT JOIN res_espacio esp ON aca.codigo_espacio = esp.codigo
            LEFT JOIN res_profesor prof ON aca.codigo_profesor = prof.codigo
            LEFT JOIN res_asignacion_herramientas_conceptuales rc ON aca.codigo_resultados = rc.codigo WHERE aca.codigo_resultados = $id";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function saveAssignConceptualResult(int $codeTeacher, int $codeAcademicArea, int $codeConceptualResult){
            $queryInsert = "INSERT INTO res_asignacion_herramientas_conceptuales(codigo_profesor,codigo_espacio,codigo_herramientas_conceptuales) VALUES(?,?,?)";
            $arrData = array($codeTeacher, $codeAcademicArea, $codeConceptualResult);
            $resInsert = $this->insert($queryInsert, $arrData);
            return $resInsert;
        }

        public function updateAssignConceptualResult(array $arrData){
            $queryUpdate = "UPDATE res_asignacion_herramientas_conceptuales SET codigo_profesor = ?, codigo_espacio = ?, codigo_herramientas_conceptuales = ? WHERE id = ?";
            $request = $this->update($queryUpdate, $arrData);
            return $request;
        }

        public function deleteAssignConceptualResult(int $id){
            $sql = "DELETE FROM res_asignacion_herramientas_conceptuales WHERE id = $id";
            $request = $this->delete($sql);
            return $request;
        }
    }
?>