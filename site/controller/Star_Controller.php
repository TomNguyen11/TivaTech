<?php
    if(!defined('PATH_SYSTEM')) {
        die ("Bad requested!");
    }
    class Star_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load session
            $this->library->load('session');
            // Load Star_Model
            $this->model->loadSite('star');

            header('content-type: application/json');
            $this->model->loadSite('profile');
            if(isset($_GET['author_id']) && isset($_SESSION['idUser'])) {
                $userReID = $_GET['author_id'];
                $userClID = $_SESSION['idUser'];
                $this->model->star->createStar($userReID, $userClID);
                $countStar = $this->model->profile->CountStarByID($userReID);
                if($this->model->star->checkStar($userReID, $userClID)) {
                    echo json_encode([
                        'stars' => $countStar,
                        'isStar' => true
                    ]);
                } else {
                    echo json_encode([
                        'stars' => $countStar,
                        'isStar' => false
                    ]);
                }
            }
            exit;
        }
    }
?>
