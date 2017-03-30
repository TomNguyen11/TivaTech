<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Topic_one_Controller extends TT_Controller
    {

        public function indexAction()
        {
            // Load session
            $this->library->load('session');
            // Load model
            if(isset($_GET['topic_id'])) {
                $topic_id = $_GET['topic_id'];
                $this->model->loadSite('posts');
                $this->model->loadSite('profile');
                $this->model->loadSite('author');
                $this->model->loadSite('topic');
                $this->model->loadSite('like');
                $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;

                $posts = $this->model->topic->getPostByTopicID($topic_id);
                $topPosts = $this->model->posts->getTopPosts();
                $thisTopic = $this->model->topic->getTopicInfoByTopicID($topic_id);
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
                $topTopics = $this->model->topic->getTopTopics();
                $topAuthors = $this->model->author->getListTopAuthorDesc();

                foreach ($topAuthors as $key => $value) {
                    $authorID = $topAuthors[$key]['id'];
                    $authorFollowers[$authorID] = $this->model->profile->getQuatityFollowerByID($authorID);
                }
                foreach ($topAuthors as $key => $value) {
                    $authorPosts[$authorID] = $this->model->profile->getQuatityPostByID($authorID);
                }
                foreach ($topPosts as $key => $value) {
                    $topPostsAuthorInfo[$topPosts[$key]['user_id']] = $this->model->profile->getAuthorInfoByID($topPosts[$key]['user_id']);
                }
                if(count($posts)==0){
                    $data = array(
                        'posts' => $posts,
                        'topAuthors' => $topAuthors,
                        'authorFollowers' => $authorFollowers,
                        'topPosts' => $topPosts,
                        'topPostsAuthorInfo' => $topPostsAuthorInfo,
                        'topTopics' => $topTopics,
                        'classNameTopPosts' => $classNameTopPosts,
                        'thisTopic' => $thisTopic,
                        'stt' => 'topics'
                    );

                } else {
                    foreach ($posts as $key => $value) {
                        $topicNames[$posts[$key]['id']] = $this->model->posts->getTopicNameByPostId($posts[$key]['id']);
                    }

                    foreach ($posts as $key => $value) {
                        $avatar[$posts[$key]['id']] = $this->model->posts->getAvatarByID($posts[$key]['id']);
                    }

                    foreach ($posts as $key => $value) {
                        $author[$posts[$key]['id']] = $this->model->posts->getAuthorByID($posts[$key]['id']);
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
                        'classNameTopPosts' => $classNameTopPosts,
                        'thisTopic' => $thisTopic,
                        'stt' => 'topics',
                        'classNameStar' => $classNameStar

                    );

                }
                // Load view
                $this->view->load('topic_one', $data);

                // Show view
                $this->view->show();
            }
        }
}
?>
