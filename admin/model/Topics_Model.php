<?php
    if(!defined('PATH_SYSTEM')){
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Topics_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function getListTopics()
        {
            $query = "SELECT * FROM tbl_topics ORDER BY id DESC ";
            $result = array();
            $result = $this->getList($query);
            return $result;
        }
    }
?>
