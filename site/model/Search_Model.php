<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once 'system/core/TT_Model.php';
    class Search_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function search($value)
        {
            $value = mysqli_real_escape_string($this->__conn, $value);
            $query = "SELECT * FROM tbl_posts WHERE title LIKE '%".$value."%'";
            $result = mysqli_query($this->__conn, $query);
            if($result) {
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo "<p>" . $row['title'] . "</p>";
                    }
                    // Close result set
                    mysqli_free_result($result);
                } else{
                    echo "<p>No matches found for <b>$value</b></p>";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($this->__conn);
            }
        }
        public function returnResult($value)
        {
            $value = mysqli_real_escape_string($this->__conn, $value);
            $query = "SELECT * FROM tbl_posts WHERE title LIKE '%".$value."%'";
            $result = $this->getList($query);
            return $result;
        }
    }

?>
