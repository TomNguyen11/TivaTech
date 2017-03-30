<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Session_Library
    {
        /**
         * [__init Start session]
         * @return [none] [Not return]
         */
        public function __construct()
        {
            session_start();
        }
        /**
         * [setSession Set session]
         * @param [string] $key   [Session Name]
         * @param [dynamic] $value [Session Value]
         */
        public static function setSession($key, $value)
        {
            $_SESSION[$key] = $value;
        }
        /**
         * [unsetSession unset Session]
         * @param [string] $sessionName [Session Name]
         */
        public function unsetSession($sessionName)
        {
            unset($_SESSION[$sessionName]);
        }
        public function destroySession()
        {
            session_destroy();
        }

    }
?>
