<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM."/core/TT_Model.php";
    class Setting_Model extends DB_Driver
    {
        function __construct()
        {
            parent::__construct();
        }
        public function updateProfile($email, $firstname, $lastname, $userID)
        {
            $data = array(
                'email' => $email,
                'firstname' => $firstname,
                'lastname' => $lastname
            );
            $where = 'id='.$userID;
            $result = $this->update('tbl_users', $data, $where);
            return $result;
        }
        public function uploadAvatar($photo, $userID)
        {
            if($photo!="") {
                $data = array(
                    'photo' => $photo
                );
                $where = 'id='.$userID;
                $result = $this->update('tbl_users', $data, $where);
                return $result;
            }
        }
        public function changePwd($oldPwd, $newPwd, $rePwd)
        {
            $salt = "@TomT9ch*15";
            $oldPwd = crypt($oldPwd, $salt);
            if($oldPwd != $_SESSION['pwd']) {
                return false;
            } else {
                if(strlen($newPwd)<8 || $rePwd != $newPwd) {
                    return false;
                }
                else {
                    $newPwd = crypt($newPwd, $salt);
                    $data = array(
                        'password' => $newPwd
                    );
                    $userID = $_SESSION['idUser'];
                    $where = 'id='.$userID;
                    $result = $this->update('tbl_users', $data, $where);
                    return $result;
                }
            }

        }
    }
?>
