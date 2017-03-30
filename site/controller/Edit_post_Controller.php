<?php
    if(!defined('PATH_SYSTEM')) {
        die('Bad requested!');
    }
    class Edit_post_Controller extends TT_Controller
    {
        public function indexAction()
        {

            //Load session library
            $this->library->load('session');

            // Load helper
            $this->helper->load('editor');


            if(isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                // Load model
                $this->model->loadSite('create_post');
                $this->model->loadSite('posts');
                $this->model->loadSite('topic');
                $allTopicNames = $this->model->create_post->getListTopics();
                $postInfo = $this->model->posts->getPostInfoByPostID($post_id);
                $topicNames = $this->model->topic->getTopicByPostID($post_id);
                $editor = ckeditor('content', $postInfo[0]['content']);
                $data = array(
                    'editor' => $editor,
                    'allTopicNames' => $allTopicNames,
                    'postInfo' => $postInfo,
                    'topicNames' => $topicNames
                );

                // Load view create_post

                $this->view->load('edit_post', $data);
                $this->view->show();
            }

        }
        public function editAction()
        {
            $this->library->load('session');
            // Load helper
            $this->helper->load('editor');

            $editor = ckeditor('content', htmlentities('Content of this post'));

            // Load model
            $this->model->loadSite('create_post');
            $this->model->loadSite('topic');
            $allTopicNames = $this->model->create_post->getListTopics();

            if(isset($_POST['btn-submit']) && isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $topics = $_POST['topics'];
                $user_id = $_SESSION['idUser'];

                $this->model->loadSite('posts');

                if(strlen($title)==0 || strlen($content)==0){
                    $data = array(
                        'editor' => $editor,
                        'msg' => 'Title or content of this post is empty!',
                        'allTopicNames' => $allTopicNames
                    );
                }
                else {
                    $res = $this->model->topic->deleteRelativeTopicByPostID($post_id);
                    $result = $this->model->posts->editPost($post_id, $title, $content, $topics, $user_id);
                    if($result) {
                        $data = array(
                            'editor' => $editor,
                            'msg' => 'Update successed!',
                            'allTopicNames' => $allTopicNames,

                        );
                    }
                    else {
                        $data = array(
                            'editor' => $editor,
                            'msg' => 'Update failed!'
                        );
                    }
                }

                $this->view->load('create_post',$data);
                $this->view->show();
        }
    }
}
?>
