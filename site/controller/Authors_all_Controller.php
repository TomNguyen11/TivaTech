<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Authors_all_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load session
            $this->library->load('session');
            $user_id = $_SESSION['idUser'];
            // Load model
            $this->model->loadSite('author');
            $allauthors = $this->model->author->getAllAuthors();
            $this->model->loadSite('star');
            foreach ($allauthors as $key => $value) {
                $checkStarTopAuthors[$allauthors[$key]['id']] = $this->model->star->checkStar($value['id'], $user_id);
                if($checkStarTopAuthors[$allauthors[$key]['id']]) {
                    $classNameStar[$allauthors[$key]['id']] = "btn-star isStar";
                } else {
                    $classNameStar[$allauthors[$key]['id']] = "btn-star unStar";
                }
            }
            $data = array(
                'allauthors' => $allauthors,
                'stt' => 'authors',
                'classNameStar' => $classNameStar
            );
            $this->view->load('authors_all', $data);
            $this->view->show();
        }
        public function detailAction()
        {
            // Load session
            $this->library->load('session');

            // Load Profile_Model
            $this->model->loadSite('profile');
            if(isset($_GET['author_id'])) {
                $userID = $_GET['author_id'];
                $authorInfo = $this->model->profile->getAuthorInfoByID($userID);
                $quatityFollowers = $this->model->profile->getQuatityFollowerByID($userID);
                $quatityFollowUsers = $this->model->profile->getQuatityFollowUserByID($userID);
                $quatityPosts = $this->model->profile->getQuatityPostByID($userID);
                $quatityFollowingTopics = $this->model->profile->getQuatityTopicFollowingByID($userID);
                $quatityClips = $this->model->profile->getQuatityClipByID($userID);

                // Load Posts_Model
                $this->model->loadSite('posts');
                $posts = $this->model->posts->getListPostByUserID($userID);
                $topicNames = array();
                $avatar = array();
                $author = array();
                if(count($posts)!=0){
                    foreach ($posts as $key => $value) {
                        $topicNames[$posts[$key]['id']] = $this->model->posts->getTopicNameByPostId($posts[$key]['id']);
                    }

                    foreach ($posts as $key => $value) {
                        $avatar[$posts[$key]['id']] = $this->model->posts->getAvatarByID($posts[$key]['id']);
                    }

                    foreach ($posts as $key => $value) {
                        $author[$posts[$key]['id']] = $this->model->posts->getAuthorByID($posts[$key]['id']);
                    }
                }
                $this->model->loadSite('like');
                $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
                $className = array();
                if(count($posts)!=0) {
                    foreach ($posts as $key => $value) {
                        $checkLikes[$posts[$key]['id']] = $this->model->like->checkLike($posts[$key]['id'], $user_id);
                        if($checkLikes[$posts[$key]['id']]){
                            $className[$posts[$key]['id']] = "btn-like islike";
                            $title[$posts[$key]['id']] = "Dislike";
                        }
                        else {
                            $className[$posts[$key]['id']] = "btn-like unlike";
                            $title[$posts[$key]['id']] = "Like";
                        }
                    }
                }
                $this->model->loadSite('star');

                    $checkStar = $this->model->star->checkStar($authorInfo[0]['id'], $user_id);
                    if($checkStar) {
                        $classNameStar = "btn-star isStar";
                    } else {
                        $classNameStar = "btn-star unStar";
                    }


                $data = array(
                    'authorInfo' => $authorInfo,
                    'quatityFollowers' => $quatityFollowers,
                    'quatityFollowUsers' => $quatityFollowUsers,
                    'quatityPosts' => $quatityPosts,
                    'quatityFollowingTopics' => $quatityFollowingTopics,
                    'quatityClips' => $quatityClips,
                    'className' => $className,
                    'posts' => $posts,
                    'topicNames' => $topicNames,
                    'avatar' => $avatar,
                    'author' => $author,
                    'stt' => 'authors',
                    'classNameStar' => $classNameStar
                );
                // Load view
                $this->view->load('author_one', $data);

                // Show view
                $this->view->show();
            }

        }
    }
?>
