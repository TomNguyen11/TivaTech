<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Admin_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $data = array(
                'stt' => 'admin'
            );
            $this->view->loadAdmin('admin_view', $data);
            $this->view->show();
        }
    }
?>
