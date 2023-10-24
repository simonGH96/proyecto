<?php
    class EditLCounseling extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function EditLCounseling(){
            if($_POST && !empty($_POST['txtUser']) && !empty($_POST['txtPassword'])){
                $strUser = strtolower(strClean($_POST['txtUser']));
                if(strlen($_POST['txtPassword']) < 64){
                    $strPassword = hash("SHA256", strClean($_POST['txtPassword']));
                } else{
                    $strPassword = strClean($_POST['txtPassword']);
                }
                $requestUser = $this->model->validateSession($strUser, $strPassword);
                if(!empty($requestUser)){
                    $data['page_tag'] = "Modificar Consejeria";
                    $data['page_title'] = "Modificación Consejerías";
                    $data['page_functions_js'] = "functions_edit_con.js";
                    $data['user'] = $strUser;
                    $data['pass'] = $strPassword;
                    $this->views->getView($this,"EditLCounseling",$data);
                } else {
                    echo "<script> alert('Credenciales incorrectas');
                        window.location= '".baseUrl()."Login'
                    </script>";
                }
            }else {
                echo "<script> alert('Debe ingresar usuario y contraseña');
                    window.location= '".baseUrl()."Login'
                </script>";
            }
            
        }

        public function getCounseling(){
            $arrData = $this->model->searchAllCounseling();
            for($i=0; $i<count($arrData); $i++){
                $arrData[$i]['acciones'] = '<div class="text-center">
                <button class="btn btn-outline-secondary btn-sm" id="btnEditCON" onclick="editCounselingModal(this)" title="Editar" lr="'.$arrData[$i]['codigo'].'"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-outline-danger btn-sm" id="btnDeleteCON" onclick="deleteCounseling(this) "title="Eliminar" lr="'.$arrData[$i]['codigo'].'"><i class="far fa-trash-alt"></i></button>
                </div>';
            };
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getCounselingById(int $idCON){
            $id = intval(strClean($idCON));
            if($id > 0){
                $arrData = $this->model->searchCounselingById($idCON);
                $this->getByIdCONMessage($arrData);
            }
            die();
        }

        public function postCounseling(){
            $code = $this->getLastCode() + 1;
            $name = strClean($_POST['txtNameAdd']);
            $description = strClean($_POST['txtDescriptionAdd']);
            $data = $this->model->saveCounselingResult($code, $name, $description);
            $this->postPutLRMessage($data);
        }

        public function putCounselingResult(int $id){
            $name = strClean($_POST['txtNameEdit']);
            $description = strClean($_POST['txtDescriptionEdit']);
            $data = $this->model->updateCounseling($id, $name, $description);
            $this->postPutLRMessage($data);
        }

        public function deleteLearningResult(int $id){
            $data = $this->model->deleteLearningResult($id);
            $this->deleteCONMessage($data);
        }

        private function getLastCode(){
            $data = $this->model->searchLastCode();
            return $data[0]['code'];
        }

        private function postPutCONMessage($arrData){
            $arrResponse = "";
            if($arrData > 0){
                $arrResponse = array('status' => true, 'msg' => 'Datos procesados correctamente.');
            } else if($arrData == 'exist'){
                $arrResponse = array('status' => false, 'msg' => '¡Advertencia! La consejeria ya existe.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        private function getByIdCONMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            return $arrResponse;
        }

        private function deleteCONMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'No es poisble eliminar los datos.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'La Consejeria ha sido eliminada');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            return $arrResponse;
        }
    }
?>