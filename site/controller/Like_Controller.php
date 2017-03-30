<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Like_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load session
            $this->library->load('session');
            // Load home_model
            $this->model->loadSite('like');
            $this->model->loadSite('posts');
            $this->model->loadSite('profile');
            $this->model->loadSite('author');
            $this->model->loadSite('topic');

            header('content-type: application/json');

            if(isset($_GET['post_id']) && isset($_SESSION['idUser'])) {
                // Load model
                $post_id = $_GET['post_id'];
                $user_id = $_SESSION['idUser'];
                $this->model->like->createLike($user_id, $post_id);
                $countLike = $this->model->posts->getCountLikeByID($post_id);
                if($this->model->like->checkLike($post_id, $user_id)) {
                    echo json_encode([
                        'likes'=> $countLike,
                        'isLike' => true
                    ]);

                }
                else {
                    echo json_encode([
                        'likes'=> $countLike,
                        'isLike' => false
                    ]);

                }

            }
            exit;

        }

    }
?>
