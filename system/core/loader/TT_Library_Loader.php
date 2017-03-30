<?php
    if ( ! defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    /**
     * @filesource system/core/loader/TT_Library_Loader.php
     *
     */
    class TT_Library_Loader
    {
        /**
        * Load library
        *
        * @param   string
        * @param   array
        * @desc    hàm load library, tham số truyền vào là tên của library và
        *          danh sách các biến trong hàm khởi tạo (nếu có)
        */
       public function load($library, $args = array())
       {
           // Neu thu vien chua dc loas thi thuc hien load
           if(empty($this->{$library})) {
               // Chuyen chu hoa dau va them hau to _Library
               $class = ucfirst($library).'_Library';
               require_once(PATH_SYSTEM.'/library/'.$class.'.php');
               $this->{$library} = new $class($args);
           }
       }
    }
?>
