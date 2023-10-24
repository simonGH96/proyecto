<?php
    class EditAssignConceptualResult extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function EditAssignConceptualResult(){
            if($_POST && !empty($_POST['txtUser']) && !empty($_POST['txtPassword'])){
                $strUser = strtolower(strClean($_POST['txtUser']));
                if(strlen($_POST['txtPassword']) < 64){
                    $strPassword = hash("SHA256", strClean($_POST['txtPassword']));
                } else{
                    $strPassword = strClean($_POST['txtPassword']);
                }
                $requestUser = $this->model->validateSession($strUser, $strPassword);
                if(!empty($requestUser)){
                    $data['page_tag'] = "Modificar Asignación de Herramientas Conceptuales";
                    $data['page_title'] = "Modificación Herramientas Conceptuales";
                    $data['page_functions_js'] = "functions_assign_cr.js";
                    $data['user'] = $strUser;
                    $data['pass'] = $strPassword;
                    $this->views->getView($this,"EditAssignConceptualResult",$data);
                } else {
                    echo "<script>window.location.href='".baseUrl()."Login'</script>";
                }
            }else {
                echo "<script>window.location.href='".baseUrl()."Login'</script>";
            }
        }

        public function getAssignConceptualResultById(int $idALR){
            $id = intval(strClean($idALR));
            if($id > 0){
                $arrData = $this->model->searchAssignConceptualResultById($idALR);
                $this->getByIdACRMessage($arrData);
            }
            die();
        }

        public function getAssignConceptualResult(){
            $arrData = $this->model->searchAssignConceptualResult();
            for($i=0; $i<count($arrData); $i++){
                $arrData[$i]['acciones'] = '<div class="text-center">
                <button class="btn btn-outline-secondary btn-sm" id="btnEditCR" onclick="editAssignConceptualResultModal(this)" title="Editar" alr="'.$arrData[$i]['id'].'"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-outline-danger btn-sm" id="btnDeleteCR" onclick="deleteAssignConceptualResult(this) "title="Eliminar" alr="'.$arrData[$i]['id'].'"><i class="far fa-trash-alt"></i></button>
                </div>';
            };
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function postAssignConceptualResult(){
            if($_POST){
                if(empty($_POST['listConceptualResult']) || empty($_POST['listTeacher']) || empty($_POST['listSubject'])){
                    $arrResponse = array("status" => false, "msg" => "Datos incorrectos.");
                } else {
                    $intConceptualResult = intval(strClean($_POST['listConceptualResult']));
                    $intTeacher = intval(strClean($_POST['listTeacher']));
                    $intSubject = intval(strClean($_POST['listSubject']));
                    $requestACR = $this->model->saveAssignConceptualResult($intTeacher, $intSubject, $intConceptualResult);
                    $arrResponse = $this->postPutAssignCRMessage($requestACR);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function putAssignConceptualResult(int $intId){
            $intConceptualResult = intval(strClean($_POST['listEditConceptualResult']));
            $intTeacher = intval(strClean($_POST['listEditTeacher']));
            $intSubject = intval(strClean($_POST['listEditSubject']));
            $requestACR = $this->model->updateAssignConceptualResult($intTeacher, $intSubject, $intConceptualResult, $intId);
            $arrResponse = $this->postPutAssignCRMessage($requestACR);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function deleteAssignConceptualResult($id){
            $data = $this->model->deleteAssignConceptualResult($id);
            $this->deleteAssignCRMessage($data);
        }

        private function getByIdACRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            return $arrResponse;
        }

        private function postPutAssignCRMessage($arrData){
            $arrResponse = "";
            if($arrData > 0){
                $arrResponse = array('status' => true, 'msg' => 'Datos procesados correctamente.');
            } else if($arrData == 'exist'){
                $arrResponse = array('status' => false, 'msg' => '¡Advertencia! La asignación ya existe.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }
            return $arrResponse;
        }

        private function deleteAssignCRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'No es poisble eliminar los datos.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'La herramienta conceptual ha sido eliminada');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            return $arrResponse;
        }
    }
?>