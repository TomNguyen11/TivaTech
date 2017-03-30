<?php
    if(!defined('PATH_SYSTEM')){
        die ('Bad requested!');
    }
    require_once 'system/core/TT_Model.php';
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
        public function getListPostByUserID($userID)
        {
            $query = "SELECT * FROM `tbl_posts` WHERE user_id='$userID' ORDER BY id DESC ";
            $post = array();
            $post = $this->getList($query);
            return $post;
        }
        public function getTopicNameByPostId($postId)
        {
            $query = "SELECT tbl_topics.name topicName, tbl_topics.id id
                    FROM tbl_topics, tbl_post_topic, tbl_posts
                    WHERE tbl_topics.id = tbl_post_topic.topic_id
                    AND tbl_post_topic.post_id = tbl_posts.id
                    AND tbl_posts.id = '$postId'";
            $topicNames = array();
            $topicNames = $this->getList($query);
            return $topicNames;
        }
        public function getAvatarByID($postId)
        {
            $query = "SELECT tbl_users.photo FROM tbl_users, tbl_posts
                        WHERE tbl_users.id = tbl_posts.user_id
                        AND tbl_posts.id = '$postId'";
            $result = $this->getItem($query);
            return $result['photo'];
        }
        public function getAuthorByID($postId)
        {
            $query = "SELECT tbl_users.firstname firstname, tbl_users.lastname lastname, tbl_users.id id
                        FROM tbl_users, tbl_posts
                        WHERE tbl_users.id = tbl_posts.user_id
                        AND tbl_posts.id = '$postId'";
            $result = $this->getItem($query);

            return $result;
        }
        public function getTopPosts()
        {
            $query = "SELECT * FROM tbl_posts ORDER BY quatity_likes DESC LIMIT 0,2";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
        public function getCountLikeByID($post_id)
        {
            $query = "SELECT quatity_likes FROM tbl_posts WHERE id='$post_id'";
            $result = $this->getItem($query);
            return $result['quatity_likes'];
        }
        public function getPostInfoByPostID($post_id)
        {
            $query = "SELECT * FROM tbl_posts WHERE id='$post_id'";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
        public function getPostSameAuthor($userID, $post_id)
        {
            $query = "SELECT * FROM tbl_posts WHERE id<>'$post_id' AND user_id='$userID' LIMIT 0,3";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
        public function getCountCommentByID($post_id)
        {
            $query = "SELECT quatity_comments FROM tbl_posts WHERE id='$post_id'";
            $result = $this->getItem($query);
            return $result['quatity_comments'];
        }
        public function UpdateCountCommentByID($post_id)
        {
            $count = $this->getCountCommentByID($post_id);
            $count = $count + 1;
            $data = array(
                'quatity_comments' => $count
            );
            $result = $this->update('tbl_posts', $data, "id='$post_id'");
            return $result;
        }
        public function editPost($post_id, $title, $content, $topics, $user_id)
        {
            $data = array(
                'id' => $post_id,
                'content' => $content,
                'title' => $title,
                'created_at' => date('Y-m-d-h-i-s')
            );
            $where = "id='$post_id'";
            $result = $this->update('tbl_posts', $data, $where);

            if($topics=="") {
                return $result;
            }
            // // Xoa lien ket giua topic va post
            // $queryDel = "DELETE FROM `tbl_post_topic` WHERE post_id = '$post_id'";
            // $resultDel = mysqli_query($this->__conn, $queryDel);
            // cat chuoi topics dau vao mang
            $arrTopics = explode(',', $topics);
            // duyet tung phan tu cua arrTopics
            foreach($arrTopics as $item) {
                // cat bo khoang trang
                $item = trim($item);
                // Lay id cua topic co ten la $item, neu khong co thi them moi
                $queryTopic = "SELECT * FROM tbl_topics WHERE name='$item'";
                $rowTopic = $this->getItem($queryTopic);
                if($rowTopic) {
                    $topicId = $rowTopic['id'];
                    $topicMember = $rowTopic['quatity_member'];
                    $queryT = "SELECT DISTINCT tbl_users.id
                               FROM tbl_topics, tbl_post_topic, tbl_posts, tbl_users
                               WHERE tbl_topics.id = tbl_post_topic.topic_id
                               AND tbl_post_topic.post_id = tbl_posts.id
                               AND tbl_posts.user_id = tbl_users.id
                               AND tbl_topics.name = '$item'
                               AND tbl_users.id = '$user_id'";
                    $resultT = mysqli_query($this->__conn, $queryT);
                    $num = mysqli_num_rows($resultT);
                    if($num==0) {
                        $topicMember += 1;
                    }

                    $topicPost = $rowTopic['quatity_post'] + 1;

                    $dataTopic = array(
                        'quatity_member' => $topicMember,
                        'quatity_post' => $topicPost
                    );
                    $this->update('tbl_topics', $dataTopic, "id='$topicId'");
                } else {
                    // them moi tag
                    $dataTopic = array(
                        'name' => $item,
                        'quatity_post' => 1,
                        'quatity_member' => 1
                    );
                    $this->insert('tbl_topics', $dataTopic);
                    $topicId = mysqli_insert_id($this->__conn);
                }
                // Neu chua ton tai topic thi Insert du lieu vao tbl_post_topic
                $sql = "SELECT * FROM tbl_post_topic WHERE post_id='$post_id' AND topic_id='$topicId'";
                $check = $this->getItem($sql);
                if(!$check){
                    $dataTP = array(
                        'post_id' => $post_id,
                        'topic_id' => $topicId
                    );
                    $res = $this->insert('tbl_post_topic', $dataTP);
                    if(!$res){
                        $error .= "ERROR";
                    }
                }

            }
            if($error=="") {
                return true;
            }
            else{
            return false;
            }

        }
        public function deletePost($post_id)
        {
            //Lay cac topics lien quan toi bai post
            $query = "SELECT tbl_topics.id id, tbl_topics.name name, tbl_topics.quatity_post quatity_post
                        FROM `tbl_post_topic`, tbl_topics, tbl_posts
                        WHERE tbl_post_topic.topic_id = tbl_topics.id
                        AND tbl_post_topic.post_id = tbl_posts.id
                        AND tbl_posts.id = '$post_id'";
            $topics = $this->getList($query);
            // Xoa thong tin lien quan trong tbl_post_topic
            $result1 = $this->delete('tbl_post_topic', 'post_id='.$post_id);
            // Cap nhat lai quatity_post trong tbl_topics
            if(count($topics)>0) {
                foreach ($topics as $key => $value) {
                    $quatityPost = $value['quatity_post'];
                    $quatity_Post = ($quatityPost>0) ? ($quatityPost - 1) : 0;
                    $data = array(
                        'quatity_post' => $quatity_Post
                    );
                    $where = "id=".$value['id'];
                    $this->update('tbl_topics', $data, $where);
                }
            }
            // Cap nhat lai quatity_posts trong tbl_users
            $query2 = "SELECT tbl_users.quatity_posts quatity_posts, tbl_users.id user_id
                        FROM tbl_users, tbl_posts
                        WHERE tbl_users.id = tbl_posts.user_id AND tbl_posts.id='$post_id'";
            $result4 = $this->getItem($query2);
            $quatity_posts = $result4['quatity_posts'];
            $quatity_posts = ($quatity_posts>0) ? ($quatity_posts - 1) : 0;

            $user_id = $result4['user_id'];
            $dataU = array(
                'quatity_posts' => $quatity_posts
            );
            $result5 = $this->update('tbl_users',$dataU, "id='$user_id'");
            // Xoa bai post
            $table1 = 'tbl_posts';
            $where1 = 'id='.$post_id;
            $result3 = $this->delete($table1, $where1);
            return ($result1 & $result3 & $result4 & $result5);
        }
}
?>
