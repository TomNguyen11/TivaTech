<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Topic_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function getTopTopics()
        {
            $query = "SELECT * FROM tbl_topics ORDER BY quatity_post DESC LIMIT 0,7";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
        public function getTopicByPostID($post_id)
        {
            $query = "SELECT tbl_topics.name topic_name FROM tbl_topics, tbl_post_topic, tbl_posts
                        WHERE tbl_posts.id=tbl_post_topic.post_id
                        AND tbl_post_topic.topic_id=tbl_topics.id
                        AND tbl_posts.id='$post_id'";
            $result = $this->getList($query);
            return $result;
        }
        public function deleteRelativeTopicByPostID($post_id)
        {
            $queryGet = "SELECT topic_id FROM tbl_post_topic WHERE post_id = '$post_id'";
            $listTopicID = $this->getList($queryGet);
            foreach ($listTopicID as $key => $value) {
                $topicID = $value['topic_id'];
                // Lay quatity_post trong tbl_topics
                $sql = "";
                $sql = "SELECT * FROM tbl_topics WHERE id='$topicID'";
                $res = $this->getItem($sql);
                $quatityPost = $res['quatity_post'];
                // Update quatity_post
                $quatityPost = ($quatityPost>0) ? ($quatityPost - 1) : 0;
                $data = array(
                    'quatity_post' => $quatityPost
                );
                $r = $this->update('tbl_topics', $data, "id='$topicID'");
                if(!$r) echo $r;

            }
            $queryDel = "DELETE FROM `tbl_post_topic` WHERE post_id = '$post_id'";
            $result = mysqli_query($this->__conn, $queryDel) or die('ERROR DELETE topic_post: '.mysqli_error($this->__conn));
            return $result;
        }
        public function getAllTopics()
        {
            $query =  "SELECT * FROM tbl_topics";
            $result = $this->getList($query);
            return $result;
        }
        public function getPostByTopicID($topic_id)
        {
            $query = "SELECT tbl_posts.id id, tbl_posts.user_id user_id, tbl_posts.title title,
                        tbl_posts.content content, tbl_posts.quatity_likes quatity_likes,
                        tbl_posts.quatity_clips quatity_clips, tbl_posts.quatity_comments quatity_comments,
                        tbl_posts.created_at created_at
                        FROM tbl_posts, tbl_topics, tbl_post_topic
                        WHERE tbl_posts.id = tbl_post_topic.post_id
                        AND tbl_post_topic.topic_id = tbl_topics.id
                        AND tbl_topics.id = '$topic_id'";
            $result = $this->getList($query);
            return $result;
        }
        public function getTopicInfoByTopicID($topic_id)
        {
            $query = "SELECT * FROM tbl_topics WHERE id='$topic_id'";
            $result = $this->getItem($query);
            return $result;
        }
    }
?>
