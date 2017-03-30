<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Posts_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load model
            $this->model->loadAdmin('posts');
            $this->model->loadAdmin('authors');
            $posts = $this->model->posts->getListPost();
            $authors = array();
            foreach ($posts as $key => $value) {
                $authors[$value['id']] = $this->model->authors->getAuthorByPostID($value['id']);
            }
            $data = array(
                'posts' => $posts,
                'authors' => $authors,
                'stt' => 'posts'
            );
            $this->view->loadAdmin('post_view', $data);
            $this->view->show();
        }
    }
?>
