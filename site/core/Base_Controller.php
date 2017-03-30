<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Base_Controller extends TT_Controller
    {
        public function __contruct()
        {
            parent::__contruct();
        }
        public function load_header()
        {
            // Load noi dung header

        }
        public function load_sidebar()
        {
            // Load noi dung sidebar
        }

        // Ham huy nay co nhiem vu show noi dung cua view,
        // luc nay cac controller khong can hoi den $this->view_show() nua
        public function __destruct()
        {
            $this->view->show();
        }
    }
?>
