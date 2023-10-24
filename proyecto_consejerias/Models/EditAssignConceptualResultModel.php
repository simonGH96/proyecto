<?php
    class EditAssignConceptualResultModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function validateSession(string $user, string $password){
            $sql = "SELECT cedula,clave FROM res_profesor WHERE 
                    cedula = '$user' and 
                    clave = '$password'";
            $request = $this->select($sql);
            return $request;
        }

        public function searchAssignConceptualResult(){
            $querySelect = "SELECT ara.id, ra.descripcion AS learning_result,
             prof.nombre AS teacher_firstname,
             prof.apellido AS teacher_lastname,
            esp.nombre as subject 
            from res_asignacion_herramientas_conceptuales ara
            LEFT JOIN res_espacio esp ON ara.codigo_espacio = esp.codigo
            LEFT JOIN res_profesor prof ON ara.codigo_profesor = prof.codigo
            LEFT JOIN res_resultados_de_aprendizaje ra ON ara.codigo_resultados = ra.codigo";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchAssignConceptualResultById(int $id){
            $querySelect = "SELECT * FROM res_asignacion_herramientas_conceptuales WHERE id = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function saveAssignConceptualResult(int $codeTeacher, int $codeSubject, int $codeConceptualResult){
            $queryInsert = "INSERT INTO res_asignacion_herramientas_conceptuales(codigo_profesor,codigo_espacio,codigo_resultados) VALUES(?,?,?)";
            $arrData = array($codeTeacher, $codeSubject, $codeConceptualResult);
            $resInsert = $this->insert($queryInsert, $arrData);
            return $resInsert;
        }

        public function updateAssignConceptualResult(int $intTeacher, int $intSubject, int $intConceptualResult, int $intId){
            $queryUpdate = "UPDATE res_asignacion_herramientas_conceptuales SET codigo_profesor = ?, codigo_espacio = ?, codigo_resultados = ? WHERE id = ?";
            $arrData = array($intTeacher, $intSubject, $intLearningResult, $intId);
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