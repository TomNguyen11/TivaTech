<?php
    /**
     * @package TivaTech
     * @filesource system/core/loader/TT_Helper_Loader.php
     */
    class TT_Helper_Loader
    {
        /**
         * Load helper
         * @desc ham load helper, tham so truyen vao la ten cua helper
         */
        public function load($helper)
        {
            $helper = ucfirst($helper).'_Helper';
            require_once (PATH_SYSTEM.'/helper/'.$helper.'.php');
        }
    }
?>
