<?php
    // file boostrap index.php o ngoai cung cua phan SDO_Model_ReflectionDataObject

    // Duong dan toi he thong
    define('PATH_SYSTEM', __DIR__.'/system');
    define('PATH_ADMIN', __DIR__.'/admin');

    // Lay thong so cau hinh
    require (PATH_SYSTEM.'/config/config.php');

    // mo file TT_Common.php, file nay chua ham TT_load() chay he thong
    include_once PATH_SYSTEM . '/core/TT_Common.php';

    // Chuong tirnh chinh
     TT_admin_load();
?>
