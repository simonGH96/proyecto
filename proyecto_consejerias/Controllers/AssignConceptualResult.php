<?php
    class AssignConceptualResult extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function getAssignConceptualResultById($id){
            $data = $this->model->searchAssignConceptualResultById($id);
        }

        public function postConceptualResult($codeTeacher, $codeAcademicArea, $codeConceptualResult){
            $data = $this->model->saveAssignConceptualResult($teacherCode, $codeAcademicArea, $codeConceptualResult);
        }

        public function putAssignConceptualResult($codeTeacher, $codeAcademicArea, $codeConceptualResult, $id){
            $arrData = array($codeTeacher, $codeAcademicArea, $codeConceptualResult, $id);
            $data = $this->model->updateAssignConceptualResult($arrData);
        }

        public function deleteAssignConceptualResult($id){
            $data = $this->model->deleteAssignConceptualResult($id);
        }
    }
?>