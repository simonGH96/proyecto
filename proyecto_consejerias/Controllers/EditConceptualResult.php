<?php
    class EditConceptualResult extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function EditConceptualResult(){
            if($_POST && !empty($_POST['txtUser']) && !empty($_POST['txtPassword'])){
                $strUser = strtolower(strClean($_POST['txtUser']));
                if(strlen($_POST['txtPassword']) < 64){
                    $strPassword = hash("SHA256", strClean($_POST['txtPassword']));
                } else{
                    $strPassword = strClean($_POST['txtPassword']);
                }
                $requestUser = $this->model->validateSession($strUser, $strPassword);
                if(!empty($requestUser)){
                    $data['page_tag'] = "Modificar Herramienta Conceptual";
                    $data['page_title'] = "Modificación Herramientas Conceptuales";
                    $data['page_functions_js'] = "functions_edit_cr.js";
                    $data['user'] = $strUser;
                    $data['pass'] = $strPassword;
                    $this->views->getView($this,"EditConceptualResult",$data);
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

        public function getConceptualResult(){
            $arrData = $this->model->searchAllConceptualResult();
            for($i=0; $i<count($arrData); $i++){
                $arrData[$i]['acciones'] = '<div class="text-center">
                <button class="btn btn-outline-secondary btn-sm" id="btnEditCR" onclick="editConceptualResultModal(this)" title="Editar" lr="'.$arrData[$i]['codigo'].'"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-outline-danger btn-sm" id="btnDeleteCR" onclick="deleteConceptualResult(this) "title="Eliminar" lr="'.$arrData[$i]['codigo'].'"><i class="far fa-trash-alt"></i></button>
                </div>';
            };
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getConceptualResultById(int $idCR){
            $id = intval(strClean($idCR));
            if($id > 0){
                $arrData = $this->model->searchConceptualResultById($idCR);
                $this->getByIdCRMessage($arrData);
            }
            die();
        }

        public function postConceptualResult(){
            $code = $this->getLastCode() + 1;
            $name = strClean($_POST['txtNameAdd']);
            $description = strClean($_POST['txtDescriptionAdd']);
            $data = $this->model->saveConceptualResult($code, $name, $description);
            $this->postPutCRMessage($data);
        }

        public function putConceptualResult(int $id){
            $name = strClean($_POST['txtNameEdit']);
            $description = strClean($_POST['txtDescriptionEdit']);
            $data = $this->model->updateConceptualResult($id, $name, $description);
            $this->postPutCRMessage($data);
        }

        public function deleteConceptualResult(int $id){
            $data = $this->model->deleteConceptualResult($id);
            $this->deleteCRMessage($data);
        }

        private function getLastCode(){
            $data = $this->model->searchLastCodeConceptual();
            return $data[0]['code'];
        }

        private function postPutCRMessage($arrData){
            $arrResponse = "";
            if($arrData > 0){
                $arrResponse = array('status' => true, 'msg' => 'Datos procesados correctamente.');
            } else if($arrData == 'exist'){
                $arrResponse = array('status' => false, 'msg' => '¡Advertencia! El resultado de aprendizaje ya existe.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        private function getByIdCRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            return $arrResponse;
        }

        private function deleteCRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'No es poisble eliminar los datos.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'El resultado de aprendizaje ha sido eliminado');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            return $arrResponse;
        }
    }
?>