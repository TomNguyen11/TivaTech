<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Authors_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $this->model->loadAdmin('authors');
            $authors = $this->model->authors->getListAuthors();
            $data = array(
                'authors' => $authors,
                'stt' => 'authors'
            );
            $this->view->loadAdmin('author_view', $data);
            $this->view->show();
        }
    }
?>
