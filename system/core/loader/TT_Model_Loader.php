<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }

    /**
     * @filesource system/core/loader/TT_Model_Loader.php
     */
    class TT_Model_Loader
    {
        /**
         * [load Load model in modul site]
         * @param  [string] $model [Model Name]
         * @param  array  $agrs  [List var]
         * @return [type]        [description]
         */
        public function loadSite($model, $agrs = array())
        {
            // Neu model chua dc load trong site
            if (empty($this->{$model})) {
                // Chuyen chua hoa dau va them hau to _Model
                $class = ucfirst($model). '_Model';
                require_once(PATH_SITE.'/model/'.$class.'.php');
                $this->{$model} = new $class($agrs);
            }
        }
        public function loadAdmin($model, $agrs = array())
        {
            // Neu model chua dc load trong site
            if (empty($this->{$model})) {
                // Chuyen chua hoa dau va them hau to _Model
                $class = ucfirst($model). '_Model';
                require_once(PATH_ADMIN.'/model/'.$class.'.php');
                $this->{$model} = new $class($agrs);
            }
        }
    }
?>
