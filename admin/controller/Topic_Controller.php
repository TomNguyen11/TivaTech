<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Topic_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $this->model->loadAdmin('topics');
            $topics = $this->model->topics->getListTopics();
            $data = array(
                'topics' => $topics,
                'stt' => 'topics'
            );
            $this->view->loadAdmin('topic_view', $data);
            $this->view->show();
        }
    }
?>
