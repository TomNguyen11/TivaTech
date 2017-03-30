<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Comment2_Controller extends TT_Controller
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
            $this->model->loadSite('comment');
            header('content-type: application/json');


            if(isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                $listComment = $this->model->comment->getListCommentByPostID($post_id);
                $countComment =  $this->model->posts->getCountCommentByID($post_id);
                $authorComments = array();
                for($i=0;$i<count($listComment);$i++) {
                    $authorComments[$listComment[$i]['id']] = $this->model->comment->getAuthor($listComment[$i]['user_id']);
                }
            }
            echo json_encode([
                'post_id' => $post_id,
                'commentList' => $listComment,
                'authorComments' => $authorComments,
                'countComment' => $countComment
            ]);
            exit;

        }
        public function createAction()
        {
            // Load session
            $this->library->load('session');
            //Load model
            $this->model->loadSite('posts');
            $this->model->loadSite('profile');
            $this->model->loadSite('comment');

            header('content-type: application/json');
            $result = false;
            if(isset($_POST['post_id']) && isset($_POST['cmtContent']) && isset($_SESSION['idUser']))
            {
                $post_id = $_POST['post_id'];
                $content = $_POST['cmtContent'];
                $userID = $_SESSION['idUser'];
                $result = $this->model->comment->setComment($userID, $post_id, $content);
            }

                if($result){
                    echo json_encode([
                        'stt' => 'successed'
                    ]);
                    //$msg = "success";
                } else {
                    echo json_encode([
                        'stt' => 'failed'
                    ]);
                    //$msg =  'failed';
                }
                // $data = array(
                //     'status' => $msg
                // );
                // $this->view->load('test');
                // $this->view->show();
            exit;

        }

    }
?>
