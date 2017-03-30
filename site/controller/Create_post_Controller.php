<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Create_post_Controller extends TT_Controller
    {
        public function indexAction()
        {

            //Load session library
            $this->library->load('session');

            // Load helper
            $this->helper->load('editor');

            $editor = ckeditor('content', htmlentities('Content of this post'));

            // Load model
            $this->model->loadSite('create_post');
            $allTopicNames = $this->model->create_post->getListTopics();

            $data = array(
                'editor' => $editor,
                'allTopicNames' => $allTopicNames,
                'stt' => 'create post'
            );

            // Load view create_post

            $this->view->load('create_post', $data);
            $this->view->show();
        }
        public function createAction()
        {
            $this->library->load('session');
            // Load helper
            $this->helper->load('editor');

            $editor = ckeditor('content', htmlentities('Content of this post'));

            // Load model
            $this->model->loadSite('create_post');
            $allTopicNames = $this->model->create_post->getListTopics();

            if(isset($_POST['btn-submit'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $topics = $_POST['topics'];
                $user_id = $_SESSION['idUser'];
                $this->model->loadSite('create_post');

                if(strlen($title)==0 || strlen($content)==0){
                    $data = array(
                        'editor' => $editor,
                        'msg' => 'Title or content of this post is empty!',
                        'allTopicNames' => $allTopicNames
                    );
                }
                else {
                    $result = $this->model->create_post->insertPost($title, $content, $topics, $user_id);
                    if($result) {
                        $data = array(
                            'editor' => $editor,
                            'msg' => 'Create successed!',
                            'allTopicNames' => $allTopicNames,
                            'stt' => 'create post'
                        );
                    }
                    else {
                        $data = array(
                            'editor' => $editor,
                            'msg' => 'Create failed!',
                            'stt' => 'create post'
                        );
                    }
                }

                $this->view->load('create_post',$data);
                $this->view->show();
            }
        }
    }
?>
