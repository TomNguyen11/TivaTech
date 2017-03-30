<?php
    // file boostrap index.php o ngoai cung cua phan SDO_Model_ReflectionDataObject

    // Duong dan toi he thong
    define('PATH_SYSTEM', __DIR__.'/system');
    define('PATH_SITE', __DIR__.'/site');

    // Lay thong so cau hinh
    require (PATH_SYSTEM.'/config/config.php');

    // Danh sach tham so gom 2 Phan
    // - controller: controller hien tai
    // - action : action  hien tai
    $segments = array(
        'controller'    => '',
        'action'        => array()
    );

    // Neu khong truyen controller vao thi lay controller mac dinh
    $segments['controller'] = empty($_GET['ctr']) ? CONTROLLER_DEFAULT : $_GET['ctr'];

    // Neu khong truyen action thi lay action mac dinh
    $segments['action'] = empty($_GET['act']) ? ACTION_DEFAULT : $_GET['act'];

    // Require controller
    require_once PATH_SYSTEM . '/core/TT_Controller.php';

    // Chay controller
    $controller = new TT_Controller();
    $controller->load($segments['controller'], $segments['action']);
?>
