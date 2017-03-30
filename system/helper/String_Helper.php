<?php
    // File system/helper/String_Helper.php
    // Chua cac ham xu ly chuoi
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    /**
     * string_to_int
     * @param string
     */
    function string_to_int($str) {
        return sprintf("%u", crc32($str));
    }
    

?>
