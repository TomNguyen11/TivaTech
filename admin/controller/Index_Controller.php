<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Index_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $this->model->loadAdmin('index');
            $countAdmins = $this->model->index->countAdmins();
            $data = array(
                'stt' => 'index',
                'countAdmins' => $countAdmins
            );
            $this->view->loadAdmin('index', $data);
            $this->view->show();
        }
    }
?>
