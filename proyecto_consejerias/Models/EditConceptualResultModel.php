<?php
    class EditConceptualResultModel extends Mysql{
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
        
        public function searchAllConceptualResult(){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchConceptualResultById(int $id){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales WHERE codigo = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchLastCode(){
            $querySelect = "SELECT max(codigo) AS code FROM res_herramientas_conceptuales";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function saveConceptualResult(int $code, string $name, string $description){
            $return = "";
            $requestSelect = $this->searchConceptualResultByName($name);
            if(empty($requestSelect)){
                $queryInsert = "INSERT INTO res_herramientas_conceptuales(codigo,descripcion,detalle) VALUES(?,?,?)";
                $arrData = array($code, $name, $description);
                $request = $this->insert($queryInsert, $arrData);
                $return = $request;
            }else{
                $return = "exist";
            }        
            return $return;   
        }
        
        public function updateConceptualResult(int $code, string $name, string $description){
            $queryUpdate = "UPDATE res_herramientas_conceptuales SET descripcion = ?, detalle = ?  WHERE codigo = ?";
            $arrData = array($name, $description, $code);
            $request = $this->update($queryUpdate, $arrData);
            return $request;
        }

        public function deleteConceptualResult(int $code){
            $sql = "DELETE FROM res_herramientas_conceptuales WHERE codigo = $code";
            $request = $this->delete($sql);
            return $request;
        }

        private function searchConceptualResultByName(string $name){
            $querySelect = "SELECT * FROM res_herramientas_conceptuales WHERE descripcion = '$name'";
            $request = $this->select($querySelect);
            return $request;
        }
    }
?>