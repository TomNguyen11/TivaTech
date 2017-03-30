<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
/**
 * Ham chay ung dung
 * @desc tham so truyen vao gom controller va action
 */
    function TT_load()
    {
        // Lay phan config khoi toa ban dau
        $config = include_once PATH_SITE . '/config/init.php';

        // Neu khong truyne controller thi lay controller mac dinh
        $controller = empty($_GET['ctr']) ? $config['default_controller'] : $_GET['ctr'];

        // Neu khong truyen action thi lay action mac dinh
        $action = empty($_GET['act']) ? $config['default_action'] : $_GET['act'];

        // Chuyen doi ten controller vi no co dang la {Name}_Controller
        $controller = ucfirst(strtolower($controller)) . '_Controller';

        // Chuyen doi ten action vi no co dinh dang la {nam}Action
        $action = strtolower($action).'Action';

        // Kiem tra file controller co ton tia khong?
        if(!file_exists(PATH_SITE.'/controller/'.$controller.'.php')) {
            die ('Controller is not exist!');
        }

        // Include controller chính để các controller con nó kế thừa
        include_once PATH_SYSTEM . '/core/TT_Controller.php';

        // Load Base_Controller
        if (file_exists(PATH_SITE.'/core/Base_Controller.php')) {
            include_once PATH_SITE.'/core/Base_Controller.php';
        }
        // Gọi file controller vào
        require_once PATH_SITE. '/controller/' . $controller . '.php';

        // Kiểm tra class controller có tồn tại hay không
        if (!class_exists($controller)){
            die ('Class controller is not exist!');
        }

        // Khoi tao controller
        $controllerObject = new $controller();

        // Kiem tra action co ton tia khong?
        if(!method_exists($controllerObject, $action)) {
            die ('Action is not exist!');
        }

        // Chay ung Dung
        $controllerObject->{$action}();

    }
    function TT_admin_load()
    {
        // Lay phan config khoi toa ban dau
        $config = include_once PATH_ADMIN . '/config/init.php';

        // Neu khong truyne controller thi lay controller mac dinh
        $controller = empty($_GET['ctr']) ? $config['default_controller'] : $_GET['ctr'];

        // Neu khong truyen action thi lay action mac dinh
        $action = empty($_GET['act']) ? $config['default_action'] : $_GET['act'];

        // Chuyen doi ten controller vi no co dang la {Name}_Controller
        $controller = ucfirst(strtolower($controller)) . '_Controller';

        // Chuyen doi ten action vi no co dinh dang la {nam}Action
        $action = strtolower($action).'Action';

        // Kiem tra file controller co ton tia khong?
        if(!file_exists(PATH_ADMIN.'/controller/'.$controller.'.php')) {
            die ('Controller is not exist!');
        }

        // Include controller chính để các controller con nó kế thừa
        include_once PATH_SYSTEM . '/core/TT_Controller.php';

        // Gọi file controller vào
        require_once PATH_ADMIN. '/controller/' . $controller . '.php';

        // Kiểm tra class controller có tồn tại hay không
        if (!class_exists($controller)){
            die ('Class controller is not exist!');
        }

        // Khoi tao controller
        $controllerObject = new $controller();

        // Kiem tra action co ton tia khong?
        if(!method_exists($controllerObject, $action)) {
            die ('Action is not exist!');
        }

        // Chay ung Dung
        $controllerObject->{$action}();

    }
?>
