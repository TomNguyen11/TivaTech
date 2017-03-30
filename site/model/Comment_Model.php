<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Comment_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function getListCommentByPostID($post_id)
        {
            $query = "SELECT * FROM tbl_comments WHERE object='post-$post_id'";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
        public function getAuthor($userID)
        {
          $query = "SELECT * FROM tbl_users WHERE id='$userID'";
          $result = array();
          $result = $this->getItem($query);
          return $result;
        }
        public function setComment($userID, $post_id, $content)
        {
            $time = date('Y-m-d-h-i-s');
            $object = 'post-'.$post_id;
            $data = array(
                'object' => $object,
                'content' => $content,
                'user_id' => $userID,
                'created_at' => date('Y-m-d-h-i-s')
            );

            $query = "INSERT INTO `tbl_comments`(`content`, `object`, `user_id`, `created_at`)
                    VALUES ('$content', '$object', '$userID', '$time')";
            $result = mysqli_query($this->__conn, $query) or die('ERROR INSERT COMMENT:'.mysqli_error($this->__conn));
            return $result;

        }
    }
?>
