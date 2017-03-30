<?php
    // File chua lop Controller chinh
    if(!defined('PATH_SYSTEM')) die ('Bad requested!');
    /**
     * @package TT_Framwork
     * @author Tom Nguyen
     * @filesource system/core/TT_Controller.php
     */
    class TT_Controller
    {
        // Object View
        protected $view = NULL;

        // Object model
        protected $model = NULL;

        // Object library
        protected $library = NULL;

        // Object helper
        protected $helper = NULL;

        // Object config
        protected $config = NULL;

        /**
         * Function Construct
         * @desc Load cac thu vien can thiet
         */
        public function __construct()
        {
            // // Loader cho config
            // require_once PATH_SYSTEM.'/core/loader/TT_Config_Loader.php';
            // $this->config = new TT_Config_Loader();
            // $this->config->load('config');

            // Loader Library
            require_once PATH_SYSTEM.'/core/loader/TT_Library_Loader.php';
            $this->library = new TT_Library_Loader();

            // Loader Helper
            require_once PATH_SYSTEM.'/core/loader/TT_Helper_Loader.php';
            $this->helper = new TT_Helper_Loader();

            // Load view
            require_once PATH_SYSTEM.'/core/loader/TT_View_Loader.php';
            $this->view = new TT_View_Loader();

            // Load model
            require_once PATH_SYSTEM.'/core/loader/TT_Model_Loader.php';
            $this->model = new TT_Model_Loader();
        }

        // function TT_load($controller, $action)
        // {
        //     // Chuyen doi ten controller vi no co dinh dang la
        //     // {Name}_Controller
        //     $controller = ucfirst(strtolower($controller)).'_Controller';
        //
        //     // Chuyen doi ten action vi no co dinh dang {name}action
        //     $action = strtolower($action).'Action';
        //
        //     // Kiem tra file controller co ton tai khong?
        //     if (!file_exists(PATH_SITE.'/controller/'.$controller.'.php')) {
        //         die ('Controller is not exist!');
        //     }
        //
        //     require_once PATH_SITE . '/controller/'.$controller.'.php';
        //
        //     // Kiem tra class contrller co ton tai khong?
        //     if (!class_exists($controller)) {
        //         die ('Class Controller is not exist!');
        //     }
        //
        //     // KHoi tao controller
        //     $controllerObject = new $controller();
        //
        //     // Kiem tra action co ton tai khong?
        //     if (!method_exists($controllerObject, $action)) {
        //         die ('Action is not exist!');
        //     }
        //
        //     // Goi toi action
        //     $controllerObject->$action();
        // }
    }


?>
