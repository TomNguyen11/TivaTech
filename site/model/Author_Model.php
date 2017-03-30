<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Author_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function getListTopAuthorDesc()
        {
            $query = "SELECT * FROM `tbl_users` ORDER BY quatity_posts DESC LIMIT 0,3";
            $result = $this->getList($query);
            return $result;
        }
        public function getAllAuthors()
        {
            $query =  "SELECT * FROM tbl_users";
            $result = $this->getList($query);
            return $result;
        }
    }
?>
