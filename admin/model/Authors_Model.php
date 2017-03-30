<?php
    if(!defined('PATH_SYSTEM')){
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Authors_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function getAuthorByPostID($post_id)
        {
            $query = "SELECT tbl_users.id id, tbl_users.firstname firstname,
                        tbl_users.lastname lastname FROM tbl_posts, tbl_users
                        WHERE tbl_posts.user_id = tbl_users.id
                        AND tbl_posts.id = $post_id";
            $author = $this->getItem($query);
            return $author;
        }
        public function getListAuthors()
        {
            $query = "SELECT * FROM tbl_users ORDER BY id DESC ";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
    }
?>
