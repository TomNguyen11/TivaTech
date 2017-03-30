<?php
    if(!defined('PATH_SYSTEM')){
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Posts_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function getListPost()
        {
            $query = "SELECT * FROM `tbl_posts` ORDER BY id DESC ";
            $post = array();
            $post = $this->getList($query);
            return $post;
        }
    }
?>
