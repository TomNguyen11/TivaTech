<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Profile_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        /**
         * [getAuthorInfoByID Get user infomation by user_id]
         * @param [string] user_id
         * @return [array]
         */
        public function getAuthorInfoByID($userID)
        {
            $query = "SELECT * FROM tbl_users WHERE id='$userID'";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
        public function getQuatityFollowerByID($userID)
        {
            $query = "SELECT COUNT(follower_id) followers FROM tbl_follows WHERE follow_user_id='$userID'";
            $result = $this->getList($query);
            return $result;
        }
        public function getQuatityFollowUserByID($userID)
        {
            $query = "SELECT COUNT(follow_user_id) follow_users FROM tbl_follows WHERE follower_id='$userID'";
            $result = $this->getList($query);
            return $result;
        }
        public function getQuatityPostByID($userID)
        {
            $query = "SELECT COUNT(id) posts FROM tbl_posts WHERE user_id='$userID'";
            $result = $this->getList($query);
            return $result;
        }
        public function getQuatityTopicFollowingByID($userID)
        {
            $query = "SELECT COUNT(topic_id) topics FROM tbl_user_topic WHERE user_id='$userID'";
            $result = $this->getList($query);
            return $result;
        }
        public function getQuatityClipByID($userID)
        {
            $query = "SELECT COUNT(post_id) post_clips FROM tbl_clips WHERE user_id='$userID'";
            $result = $this->getList($query);
            return $result;
        }
        public function CountStarByID($userID)
        {
            return $this->getAuthorInfoByID($userID)[0]['quatity_stars'];
        }
    }
?>
