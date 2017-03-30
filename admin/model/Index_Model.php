<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    require_once PATH_SYSTEM.'/core/TT_Model.php';
    class Index_Model extends DB_Driver
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function countAdmins()
        {
            $query = "SELECT COUNT(id) quatity FROM tbl_admins";
            $result = $this->getItem($query);
            return $result['quatity'];
        }
    }
 ?>
