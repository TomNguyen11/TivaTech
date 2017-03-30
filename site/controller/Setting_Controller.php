<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Setting_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Load session
            $this->library->load('session');
            if(isset($_SESSION['login'])) {
                $user_id = $_SESSION['idUser'];
                // Load model
                $this->model->loadSite('profile');
                $authorInfo = $this->model->profile->getAuthorInfoByID($user_id);
                $data = array(
                    'authorInfo' => $authorInfo,
                    'index' => 'profile'
                );
                $this->view->load('setting', $data);
                $this->view->show();
            }
        }
        public function showChangePwdAction()
        {
            // Load session
            $this->library->load('session');
            if(isset($_SESSION['login'])) {
                $user_id = $_SESSION['idUser'];
                // Load model
                $this->model->loadSite('profile');
                $authorInfo = $this->model->profile->getAuthorInfoByID($user_id);
                $data = array(
                    'authorInfo' => $authorInfo,
                    'index' => 'change pwd'
                );
                $this->view->load('setting', $data);
                $this->view->show();
            }
        }
        public function updateAction()
        {
            // Load session
            $this->library->load('session');
            if(isset($_POST['btn-submit'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $userID = $_SESSION['idUser'];
                // Load model
                $this->model->loadSite('login');
                $checkEmail = $this->model->login->checkEmail($email);
                $checkName = $this->model->login->checkName($firstname, $lastname);
                $msg = "";
                $stt = "Update profile Failed: ";
                if($checkEmail==1 && $email!=$_SESSION['email']) {
                    $msg .= "Update failed: Email is existed! Please choose other email.";
                }
                elseif ($checkEmail==-1) {
                    $msg .= "Update failed: Invalid email!";
                }
                if(!$checkName) {
                    $msg .= "<br/>A valid name just has letters.";
                }
                if(empty($msg)) {
                    $this->model->loadSite('setting');
                    $result = $this->model->setting->updateProfile($email, $firstname, $lastname, $userID);
                    if($result) {
                        $stt = "Update profle success!";
                        $this->library->session->setSession('firstname', $firstname);
                        $this->library->session->setSession('lastname', $lastname);
                        $this->library->session->setSession('email', $email);
                    }
                }
                $photo = $_FILES['photo']['name'];
                if($photo!="") {
                    $date = date('Y-m-d-h-i-s');
                    $uploadDir = "uploads/";
                    $uploadFile = $uploadDir.$date."_".basename($_FILES['photo']['name']);
                    $uploadOK = 1;
                    $imageFileType = pathinfo($uploadFile, PATHINFO_EXTENSION);
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES['photo']['tmp_name']);
                    if($check !== false) {
                        $uploadOK = 1;
                    } else {
                        $msg .= "<br/>File is not an image.";
                        $uploadOK = 0;
                    }
                    // Check file size
                    if($_FILES['photo']['size'] > 500000) {
                        $msg .= "<br/>Sorry, your file is too large.";
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "jpeg"
                        && $imageFileType != "png" && $imageFileType != "gif")
                    {
                        $msg .= "<br/> Sorry, only JPG, JPEG, PNG AND GIF are allowed.";
                        $uploadOK = 0;
                    }
                    if($uploadOK == 1) {
                        if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                            $this->model->loadSite('setting');
                            $resAvatar = $this->model->setting->uploadAvatar($uploadFile, $userID);
                            $this->library->session->setSession('avatar', $uploadFile);
                            $msg .="<br/> The file ".basename($_FILES['photo']['name']). " has been uploaded.";
                        } else {
                            $msg .="<br/> Sorry, there was an error uploading your file.";
                        }

                    }
                }
                header("Location: index.php?ctr=setting&stt=$stt&msg=$msg&ok=$uploadOK&photo=$photo");
            }
        }
        public function pwdAction()
        {
            if(isset($_POST['btn-submit'])) {
                $oldPwd = $_POST['oldPwd'];
                $newPwd = $_POST['newPwd'];
                $rePwd = $_POST['rePwd'];
                // Load session
                $this->library->load('session');
                // Load model
                $this->model->loadSite('setting');
                $result = $this->model->setting->changePwd($oldPwd, $newPwd, $rePwd);
                $err = "error";
                if($result) {
                    $err = "Change password success";
                } else {
                    $err = "Change password failed.<br/>A valid password must has greater than 7 letter and sure you confirm exactly password";
                }
                header("Location: index.php?ctr=setting&act=showChangePwd&msg=$err");
            }
        }
    }
?>
