<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Like_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function createLike($user_id, $post_id)
        {
            $query = "SELECT * FROM tbl_likes WHERE user_id='$user_id' AND post_id='$post_id'";
            $result = $this->getItem($query);
            if(!$result) {
                // Neu chua like thi insert vao tbl_likes
                $data = array(
                    'user_id' => $user_id,
                    'post_id' => $post_id,
                    'created_at' => date('Y-m-d-h:i:s')
                );
                $this->insert('tbl_likes', $data);
                // Tang 1 cho quatity_likes trong tbl_posts
                $query1 = "SELECT quatity_likes FROM tbl_posts WHERE id='$post_id'";
                $result = $this->getItem($query1);
                $likes = $result['quatity_likes'] + 1;
                $dataL = array(
                    'quatity_likes' => $likes
                );
                $this->update('tbl_posts', $dataL, "id='$post_id'");
            } else {
                // Neu da like thi delete khoi tbl_likes
                $query2 = "DELETE FROM `tbl_likes` WHERE user_id = '$user_id' AND post_id ='$post_id'";
                mysqli_query($this->__conn, $query2);
                // giam 1 cho quatity_likes trong tbl_posts
                $query1 = "SELECT quatity_likes FROM tbl_posts WHERE id='$post_id'";
                $result = $this->getItem($query1);
                $likes = ($result['quatity_likes']>0) ? $result['quatity_likes'] - 1 : 0;
                $dataL = array(
                    'quatity_likes' => $likes
                );
                $this->update('tbl_posts', $dataL, "id='$post_id'");
            }
        }

        public function checkLike($post_id, $user_id)
        {
            $query = "SELECT * FROM tbl_likes WHERE user_id='$user_id' AND post_id='$post_id'";
            $result = $this->getItem($query);
            if(!$result){
                return false;
            }
            return true;
        }
    }
?>
