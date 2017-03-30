<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Report_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $data = array(
                'stt' => 'report'
            );
            $this->view->loadAdmin('report_view', $data);
            $this->view->show();
        }
    }
?>
