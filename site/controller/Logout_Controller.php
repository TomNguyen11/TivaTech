<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Logout_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $this->library->load('session');
            // $this->library->session->unsetSession('login');
            // $this->library->session->unsetSession('firstname');
            // $this->library->session->unsetSession('avatar');
            $this->library->session->destroySession();

            // Load view login
            $this->view->load('login');
            $this->view->show();
        }
    }
?>
