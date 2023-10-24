<?php
    class ThinkingResult extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function ThinkingResult(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Pensamientos';
            $data['page_title'] = 'Pensamientos';
            $data['pagination'] = ceil($this->getThinkingResultAmount()/12);
            $data['page_functions_js'] = "functions_thinking_result.js";
            $this->views->getView($this,"ThinkingResult",$data);
            // $this->views->getView($this,"SubjectConceptual",$data);
        }

        public function SearchBarThinking($page){
            $words = "";
            if(isset($_POST['query'])){
                $words = strClean($_POST['query']);
            }
            $arrData = "";
            if (empty($words)){
                $arrData = $this->getThinkingResult();
            } else {
                $arrData = $this->model->searchBarThinkingQuery($words);
		$this->printHtmlCode($arrData);
            }
        }

        public function getThinkingResultAmount(){
            $data = $this->model->searchThinkingResultAmount();
            return $data[0]['amount'];
        }

        public function getThinkingResult(){
            $offset = 0;
            if(isset($_POST['pageNumber'])){
                $offset = intval(strClean($_POST['pageNumber']));
            }
            $offset = $offset * 12;
            $arrData = $this->model->searchAllThinkingResult($offset);
            $this->printHtmlCode($arrData);
        }

        public function getThinkingResultSelect(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllThinkingResultSelect();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['detalle'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function getThinkingResultById(int $id){
            $id = intval(strClean($id));
            if($id > 0){
                $arrData = $this->model->searchThinkingResultById($id);
		        $arrData['detalle'] = nl2br($arrData['detalle']);
                $this->getByIdTRMessage($arrData);
            }
            die();
        }

        private function getLastCode(){
            $data = $this->model->searchLastCodeThinking();
            return $data[0]['code'];
        }

        private function getByIdTRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            return $arrResponse;
        }

        private function printHtmlCode($arrData){
            $response = "";
            if(count($arrData) > 0){
                foreach($arrData as $key=>$value):
                    $response.='<div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$value['descripcion'].'</h5>
                                            <div class="card-initial-page">
                                            <div>'
                                                .$value['detalle'].'
                                            </div>
                                            <button type="button" class="btn btn-link" onclick="viewMore(this)" tr="'.$value['codigo'].'"></button>
                                        </div>
                                    <div class="text-center" id="view-subjects">
                                    <a href="'. baseUrl().'SubjectTR/SubjectTR/'.$value['codigo'].'" class="btn bd-yellow-300">Espacios académicos</a>
                                </div>
                        </div>
                    </div>
                </div>';
                endforeach;
            } else {
                $response.='No se encontrados resulados que coincidan con su b&uacutesqueda';
            }
            echo $response;
        }
    }
?>