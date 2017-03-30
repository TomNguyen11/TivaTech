<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class View_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $data = array(
                'title' => 'TivaTech Page'
            );
            // Load view
            $this->view->load('view', $data);

            // show view
            $this->view->show();
        }

    }
?>
