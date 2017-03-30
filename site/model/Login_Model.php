<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once 'system/core/TT_Model.php';
    class Login_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        /**
         * [login Check login]
         * @param  [string] $email [email]
         * @param  [string] $pwd   [password]
         * @return [boolean]        [true: login success]
         */
        public function login($email, $pwd)
        {
            $query = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$pwd'";
            $row = $this->getItem($query);
            return $row;
        }
        /**
         * [checkEmail Check email user]
         * @param  [string] $email [email]
         * @return [int]        [number of record]
         */
        public function checkEmail($email)
        {
            $email = mysqli_escape_string($this->__conn, trim($email));
            if(strlen($email)==0 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = NULL;
                return -1;
            }
            $query = "SELECT * from tbl_users WHERE email = '$email'";
            $number = $this->getNumRows($query);
            return $number;
        }
        /**
         * [checkName check valid name]
         * @param  [string] $firstname [firstname of user]
         * @param  [string] $lastname  [lastname of user]
         * @return [boolean]            [true = valid]
         */
        public function checkName($firstname, $lastname)
        {
            $firstname = mysqli_escape_string($this->__conn, trim($firstname));
            $lastname = mysqli_escape_string($this->__conn, trim($lastname));
            if(strlen($firstname)==0 || strlen($lastname)==0 ||
                !preg_match('/[a-zA-Z]/', $firstname.$lastname)
            ) {
                $firstname = NULL;
                $lastname = NULL;
                return false;
            } else {
                $firstname = stripcslashes($firstname);
                $lastname = stripcslashes($lastname);
                return true;
            }
        }
        /**
         * [checkPassword check valid password]
         * @param  [string] $password [password of user]
         * @return [boolean]           [true = valid]
         */
        public function checkPassword($password)
        {
            $password = mysqli_escape_string($this->__conn, trim($password));
            if(strlen($password)<8) {
                $password = NULL;
                return false;
            }
            return true;
        }
        public function insertUser($email, $firstname, $lastname, $password)
        {
            // Ma hoa  password
            $salt = "@TomT9ch*15";
            $password = crypt($password, $salt);
            $data = array(
                'email' => $email,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'password' => $password,
                'created_at' => date('Y-m-d-h-i-s')
            );
            $result = $this->insert('tbl_users', $data);
            return $result;
        }
        public function getLastId()
        {
            return mysqli_insert_id($this->__conn);
        }

    }
?>
