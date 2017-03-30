<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Topics_all_Controller extends TT_Controller
    {
        public function indexAction()
        {
            //Load session
            $this->library->load('session');
            //Load model
            $this->model->loadSite('topic');
            $allTopics = $this->model->topic->getAllTopics();
            $data = array(
                'allTopics' => $allTopics,
                'stt' => 'topics'
            );
            $this->view->load('topics_all', $data);
            $this->view->show();
        }

    }
?>
