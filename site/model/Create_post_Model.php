<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once 'system/core/TT_Model.php';
    class Create_post_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function insertPost($title, $content, $topics, $user_id)
        {
            // Insert post
            $query = "SELECT quatity_posts FROM tbl_users WHERE id='$user_id'";
            $result = $this->getItem($query);
            $quatityPosts = $result['quatity_posts'] + 1;
            $dataUpdate = array(
                'quatity_posts' => $quatityPosts
            );

            $this->update('tbl_users', $dataUpdate, "id = '$user_id'");
            $data = array(
                'title' => $title,
                'content' => $content,
                'user_id' => $user_id,
                'created_at' => date('Y-m-d-h-i-s'),
            );
            $result = $this->insert('tbl_posts', $data);

            // Lay id cua bai post vua them
            $postId = mysqli_insert_id($this->__conn);

            if($topics==""){
                return $result;
            }
            // Cat chuoi topics dua vao mang
            $arrTopics = explode("," , $topics);
            // Duyet tung phan tu cua topics
            $error = "";
            foreach ($arrTopics as $item)
            {
                // Cat bo khoang trang
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
                // Insert du lieu vao tbl_post_topic
                $dataTP = array(
                    'post_id' => $postId,
                    'topic_id' => $topicId
                );
                $res = $this->insert('tbl_post_topic', $dataTP);
                if(!$res){
                    $error .= "ERROR";
                }
            }
            if($error=="") {
                return true;
            }
            return false;
        }
        public function getListTopics()
        {
            $query = "SELECT name FROM tbl_topics";
            $result = $this->getList($query);
            return $result;
        }
    }
?>
