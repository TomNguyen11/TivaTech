<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Home_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $this->library->load('session');
            $data = array(
                'title' => 'TivaTech Page'
            );
            // Load home_model
            $this->model->loadSite('posts');
            $this->model->loadSite('profile');
            $this->model->loadSite('author');
            $this->model->loadSite('topic');

            $posts = $this->model->posts->getListPost();
            $topPosts = $this->model->posts->getTopPosts();
            $topPostsAuthorInfo = array();
            $topTopics = $this->model->topic->getTopTopics();

            foreach ($topPosts as $key => $value) {
                $topPostsAuthorInfo[$topPosts[$key]['user_id']] = $this->model->profile->getAuthorInfoByID($topPosts[$key]['user_id']);
            }
            foreach ($posts as $key => $value) {
                $topicNames[$posts[$key]['id']] = $this->model->posts->getTopicNameByPostId($posts[$key]['id']);
            }

            foreach ($posts as $key => $value) {
                $avatar[$posts[$key]['id']] = $this->model->posts->getAvatarByID($posts[$key]['id']);
            }

            foreach ($posts as $key => $value) {
                $author[$posts[$key]['id']] = $this->model->posts->getAuthorByID($posts[$key]['id']);
            }


            $topAuthors = $this->model->author->getListTopAuthorDesc();


            foreach ($topAuthors as $key => $value) {
                $authorID = $topAuthors[$key]['id'];
                $authorFollowers[$authorID] = $this->model->profile->getQuatityFollowerByID($authorID);
            }
            foreach ($topAuthors as $key => $value) {
                $authorPosts[$authorID] = $this->model->profile->getQuatityPostByID($authorID);
            }

            $this->model->loadSite('like');
            $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
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
            $this->model->loadSite('star');
            foreach ($topAuthors as $key => $value) {
                $checkStarTopAuthors[$topAuthors[$key]['id']] = $this->model->star->checkStar($value['id'], $user_id);
                if($checkStarTopAuthors[$topAuthors[$key]['id']]) {
                    $classNameStar[$topAuthors[$key]['id']] = "btn-star isStar";
                } else {
                    $classNameStar[$topAuthors[$key]['id']] = "btn-star unStar";
                }
            }

            $data = array(
                'posts' => $posts,
                'topicNames' => $topicNames,
                'avatar' => $avatar,
                'author' => $author,
                'topAuthors' => $topAuthors,
                'authorFollowers' => $authorFollowers,
                'className' => $className,
                'title' => $title,
                'topPosts' => $topPosts,
                'topPostsAuthorInfo' => $topPostsAuthorInfo,
                'topTopics' => $topTopics,
                'stt' => 'index',
                'classNameStar' => $classNameStar
            );

            // Load view
            $this->view->load('home', $data);

            // Show view
            $this->view->show();
        }
    }
?>
