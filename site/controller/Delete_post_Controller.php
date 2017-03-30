<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Delete_post_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load model
            $this->model->loadSite('posts');
            //header('content-type: application/json');
            if(isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                $result = $this->model->posts->deletePost($post_id);
                if($result) {
                    $msg = "successed";
                }
                else {
                    $msg = "failed";
                }
                // echo json_encode([
                //     'stt' => $msg
                // ]);
            }
            //exit;
            header('Location: index.php?ctr=profile');
        }
    }
?>
