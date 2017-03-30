<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Login_Controller extends TT_Controller
    {
        public function indexAction()
        {
            $data = array(
                'title' => 'Login Page'
            );
            // Load view
            $this->view->load('login', $data);

            // Show view
            $this->view->show();
        }
        public function loginAction()
        {
            if(isset($_POST['btn-login'])) {
                if($_POST['email']=="" || $_POST['password']=="")
                {
                    $data = array (
                         'msg' => 'Login failed: Missing email or password!'
                    );
                    $this->view->load('login', $data);
                    $this->view->show();
                }
                else {
                    $salt = "@TomT9ch*15";
                    $password = crypt($_POST['password'], $salt);
                    $data = array (
                         'email' => $_POST['email'],
                         'pwd'   => $_POST['password']
                    );
                    $this->model->loadSite('login');
                    $row = $this->model->login->login($_POST['email'], $password);

                    if($row) {
                        //Load Library
                        $this->library->load('session');
                        // Goi ham setSession
                        $this->library->session->setSession('login', 'true');
                        $this->library->session->setSession('firstname', $row['firstname']);
                        $this->library->session->setSession('lastname', $row['lastname']);
                        $this->library->session->setSession('avatar', $row['photo']);
                        $this->library->session->setSession('idUser', $row['id']);
                        $this->library->session->setSession('email', $row['email']);
                        $this->library->session->setSession('pwd', $row['password']);
                        header('Location: index.php');
                        } else {
                            $data = array (
                                'msg' => 'Login fail: Not exist acount!'
                            );
                            $this->view->load('login',$data);
                            $this->view->show();
                        }

                }
            }
        }
        public function signupAction()
        {
            if(isset($_POST['btn-signup'])) {
                $email = $_POST['email'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                if($email=="" || $firstname=="" || $lastname=="" || $password=="") {
                    $data = array(
                        'msg' => "Sign up failed: Email, firstname, lastname and password are required!"
                    );
                    // Load view
                    $this->view->load('login', $data);
                    // Show view
                    $this->view->show();
                }
                else {
                    // Load model
                    $this->model->loadSite('login');

                    $checkEmail = $this->model->login->checkEmail($email);
                    $checkName = $this->model->login->checkName($firstname, $lastname);
                    $checkPassword = $this->model->login->checkPassword($password);
                    $msg = "";

                    if($checkEmail==1) {
                        $msg .= "Sign up failed: Email is existed! Please choose other email.";
                    }
                    elseif ($checkEmail==-1) {
                        $msg .= "Sign up failed: Invalid email!";
                    }
                    if(!$checkName) {
                        $msg .= "<br/>A valid name just has letters.";
                    }
                    if(!$checkPassword) {
                        $msg .= "<br/>A Valid password must has greater than 7 characters.";
                    }
                    if(empty($msg)) {
                        // Insert into database
                        $result = $this->model->login->insertUser($email, $firstname, $lastname, $password);
                        if($result) {
                            //Load Library
                            $this->library->load('session');
                            $idUser = $this->model->login->getLastId();
                            // Goi ham setSession
                            $this->library->session->setSession('login', 'true');
                            $this->library->session->setSession('firstname', $row['firstname']);
                            $this->library->session->setSession('lastname', $row['lastname']);
                            $this->library->session->setSession('avatar', $row['photo']);
                            $this->library->session->setSession('idUser', $row['id']);
                            $this->library->session->setSession('email', $row['email']);
                            $this->library->session->setSession('pwd', $row['password']);
                            header('Location: index.php');

                            // // Load home_model
                            // $this->model->loadSite('posts');
                            // $this->model->loadSite('profile');
                            // $this->model->loadSite('author');
                            // $this->model->loadSite('topic');
                            //
                            //
                            // $posts = $this->model->posts->getListPost();
                            // $topPosts = $this->model->posts->getTopPosts();
                            // //$topPostsAuthorInfo = array();
                            // $topTopics = $this->model->topic->getTopTopics();
                            //
                            // foreach ($topPosts as $key => $value) {
                            //     $topPostsAuthorInfo[$topPosts[$key]['user_id']] = $this->model->profile->getAuthorInfoByID($topPosts[$key]['user_id']);
                            // }
                            //
                            // foreach ($posts as $key => $value) {
                            //     $topicNames[$posts[$key]['id']] = $this->model->posts->getTopicNameByPostId($posts[$key]['id']);
                            // }
                            //
                            // foreach ($posts as $key => $value) {
                            //     $avatar[$posts[$key]['id']] = $this->model->posts->getAvatarByID($posts[$key]['id']);
                            // }
                            //
                            // foreach ($posts as $key => $value) {
                            //     $author[$posts[$key]['id']] = $this->model->posts->getAuthorByID($posts[$key]['id']);
                            // }
                            //
                            // $this->model->loadSite('author');
                            // $topAuthors = $this->model->author->getListTopAuthorDesc();
                            //
                            // $this->model->loadSite('profile');
                            // foreach ($topAuthors as $key => $value) {
                            //     $authorID = $topAuthors[$key]['id'];
                            //     $authorFollowers[$authorID] = $this->model->profile->getQuatityFollowerByID($authorID);
                            // }
                            // foreach ($topAuthors as $key => $value) {
                            //     $authorPosts[$authorID] = $this->model->profile->getQuatityPostByID($authorID);
                            // }
                            //
                            // $this->model->loadSite('like');
                            // $user_id = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
                            // foreach ($posts as $key => $value) {
                            //     $checkLikes[$posts[$key]['id']] = $this->model->like->checkLike($posts[$key]['id'], $user_id);
                            //     if($checkLikes[$posts[$key]['id']]){
                            //         $img[$posts[$key]['id']] = "public/icons/liked.png";
                            //         $title[$posts[$key]['id']] = "Dislike";
                            //     }
                            //     else {
                            //         $img[$posts[$key]['id']] = "public/icons/like.png";
                            //         $title[$posts[$key]['id']] = "Like";
                            //     }
                            // }
                            //
                            // $data = array(
                            //     'posts' => $posts,
                            //     'topicNames' => $topicNames,
                            //     'avatar' => $avatar,
                            //     'author' => $author,
                            //     'topAuthors' => $topAuthors,
                            //     'authorFollowers' => $authorFollowers,
                            //     'img' => $img,
                            //     'title' => $title,
                            //     'topPosts' => $topPosts,
                            //     'topPostsAuthorInfo' => $topPostsAuthorInfo,
                            //     'topTopics' => $topTopics
                            // );
                            //
                            // // Load view
                            // $this->view->load('home', $data);
                            //
                            // // Show view
                            // $this->view->show();

                        }
                        else {
                                $data = array(
                                    'msg' => 'ERORR INSERT USER'
                                );
                                var_dump($result);
                                $this->view->load('login', $data);
                                $this->view->show();
                        }
                    }
                    else {
                        $data = array(
                            'msg' => $msg
                        );
                        $this->view->load('login', $data);
                        $this->view->show();
                    }
                }
            }
        }
    }
?>
