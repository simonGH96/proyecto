<?php
    class LoginConsejerias extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function LoginConsejerias(){
            $data['page_tag'] = 'Iniciar sesión - Consejerias';
            $data['page_title'] = 'Iniciar sesión';
            $data['page_functions_js'] = "functions_login_consejerias.js";
            $this->views->getView($this,"LoginConsejerias",$data);
        }
    }
?>