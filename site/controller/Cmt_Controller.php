<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Cmt_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load session
            $this->library->load('session');
            //Load model
            $this->model->loadSite('posts');
            $this->model->loadSite('profile');
            $this->model->loadSite('comment');

            header('content-type: application/json');
            $result = false;
            if(isset($_POST['post_id']) && isset($_POST['cmtContent']) && $_POST['cmtContent']!="" && isset($_SESSION['idUser']))
            {
                $post_id = $_POST['post_id'];
                $content = $_POST['cmtContent'];
                $userID = $_SESSION['idUser'];
                // $post_id = 44;
                // $content = "TEST";
                // $userID = 5;
                // $object = "post-44";
                $time = date('Y-m-d-h-i-s');
                // $query = "INSERT INTO `tbl_comments`(`content`, `object`, `user_id`, `created_at`)
                //         VALUES ('$content', '$object', '$userID', '$time')";
                $result = $this->model->comment->setComment($userID, $post_id, $content);
                // $data = array(
                //     'result' => $result,
                //     'query' => $query
                // );
                // $this->view->load('test', $data);
                // $this->view->show();
                $this->model->posts->UpdateCountCommentByID($post_id);
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
