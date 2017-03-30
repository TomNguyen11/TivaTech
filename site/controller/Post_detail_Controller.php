<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Post_detail_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load session
            $this->library->load('session');

            // Load home_model
            $this->model->loadSite('posts');
            $this->model->loadSite('profile');
            $this->model->loadSite('author');
            $this->model->loadSite('topic');
            $this->model->loadSite('like');

            $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;

            if(isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];

                // Load Posts_Model
                $this->model->loadSite('posts');
                $userID = $this->model->posts->getPostInfoByPostID($post_id)[0]['user_id'];
                $authorInfo = $this->model->profile->getAuthorInfoByID($userID);
                $quatityFollowers = $this->model->profile->getQuatityFollowerByID($userID);
                $quatityPosts = $this->model->profile->getQuatityPostByID($userID);
                $posts = $this->model->posts->getPostInfoByPostID($post_id);

                $topPosts = $this->model->posts->getTopPosts();
                foreach ($topPosts as $key => $value) {
                    $checkLikes[$topPosts[$key]['id']] = $this->model->like->checkLike($topPosts[$key]['id'], $user_id);
                    if($checkLikes[$topPosts[$key]['id']]){
                        $classNameTopPosts[$topPosts[$key]['id']] = "btn-like islike";
                        $titleTopPost[$topPosts[$key]['id']] = "Dislike";
                    }
                    else {
                        $classNameTopPosts[$topPosts[$key]['id']] = "btn-like unlike";
                        $titleTopPost[$topPosts[$key]['id']] = "Like";
                    }
                }

                $topPostsAuthorInfo = array();
                $topicNames = array();
                $topTopics = $this->model->topic->getTopTopics();
                foreach ($topPosts as $key => $value) {
                    $topPostsAuthorInfo[$topPosts[$key]['user_id']] = $this->model->profile->getAuthorInfoByID($topPosts[$key]['user_id']);
                }

                if(count($posts)!=0){
                    $topicNames = $this->model->posts->getTopicNameByPostId($post_id);
                }


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

                // Get posts same author
                $postsSameAuthor = $this->model->posts->getPostSameAuthor($userID, $post_id);

                foreach ($postsSameAuthor as $key => $value) {
                    $checkSameLikes[$postsSameAuthor[$key]['id']] = $this->model->like->checkLike($postsSameAuthor[$key]['id'], $user_id);
                    if($checkSameLikes[$postsSameAuthor[$key]['id']]){
                        $classSameName[$postsSameAuthor[$key]['id']] = "btn-like islike";
                        $titleSame[$postsSameAuthor[$key]['id']] = "Dislike";
                    }
                    else {
                        $classSameName[$postsSameAuthor[$key]['id']] = "btn-like unlike";
                        $titleSame[$postsSameAuthor[$key]['id']] = "Like";
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
                    'quatityPosts' => $quatityPosts,
                    'className' => $className,
                    'posts' => $posts,
                    'topicNames' => $topicNames,
                    'topPosts' => $topPosts,
                    'topPostsAuthorInfo' => $topPostsAuthorInfo,
                    'topTopics' => $topTopics,
                    'postsSameAuthor' => $postsSameAuthor,
                    'classSameName' => $classSameName,
                    'classNameTopPosts' => $classNameTopPosts,
                    'classNameStar' => $classNameStar
                );
                // Load view
                $this->view->load('post_detail', $data);

                // Show view
                $this->view->show();
            }

        }
    }
?>
