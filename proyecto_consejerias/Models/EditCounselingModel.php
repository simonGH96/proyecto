<?php
    class EditCounselingModel extends Mysql{
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
        
        public function searchAllCounseling(){
            $querySelect = "SELECT * FROM res_counseling";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function searchCounselingById(int $id){
            $querySelect = "SELECT * FROM res_counseling WHERE codigo = $id";
            $request = $this->select($querySelect);
            return $request;
        }

        public function searchLastCode(){
            $querySelect = "SELECT max(codigo) AS code FROM res_counseling";
            $request = $this->selectAll($querySelect);
            return $request;
        }

        public function saveCounseling(int $code, string $name, string $description){
            $return = "";
            $requestSelect = $this->searchCounselingByName($name);
            if(empty($requestSelect)){
                $queryInsert = "INSERT INTO res_counseling(codigo,descripcion,detalle) VALUES(?,?,?)";
                $arrData = array($code, $name, $description);
                $request = $this->insert($queryInsert, $arrData);
                $return = $request;
            }else{
                $return = "exist";
            }        
            return $return;   
        }
        
        public function updateCounseling(int $code, string $name, string $description){
            $queryUpdate = "UPDATE res_counseling SET descripcion = ?, detalle = ?  WHERE codigo = ?";
            $arrData = array($name, $description, $code);
            $request = $this->update($queryUpdate, $arrData);
            return $request;
        }

        public function deleteCounseling(int $code){
            $sql = "DELETE FROM res_counseling WHERE codigo = $code";
            $request = $this->delete($sql);
            return $request;
        }

        private function searchCounselingByName(string $name){
            $querySelect = "SELECT * FROM res_counseling WHERE descripcion = '$name'";
            $request = $this->select($querySelect);
            return $request;
        }
    }
?>