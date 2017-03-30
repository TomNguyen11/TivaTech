<?php
    /**
     * @filesource system/core/loader/TT_Config_Loader.php
     */
    class TT_Config_Loader
    {
        // Danh sach config
        protected $config = array();

        /**
         * Load helper
         *
         * @param   string
         * @desc    hàm load helper, tham số truyền vào là tên của helper
         */
        public function loadSite($config)
        {
            if(file_exists(PATH_SITE.'/config/'.$config.'.php')) {
                $config = include_once PATH_SITE.'/config/'.$config.'.php';
                if(!empty($config)) {
                    foreach($config as $key => $item) {
                        $this->config[$key] = $item;
                    }
                }
                return true;
            }
            return false;
        }
        public function loadAdmin($config)
        {
            if(file_exists(PATH_ADMIN.'/config/'.$config.'.php')) {
                $config = include_once PATH_SITE.'/config/'.$config.'.php';
                if(!empty($config)) {
                    foreach($config as $key => $item) {
                        $this->config[$key] = $item;
                    }
                }
                return true;
            }
            return false;
        }
        /**
         * Get item config
         *
         * @param string
         * @param string
         * @desc ham get config item, tham so truyen vao la ten cua
         *       item va tham so mac dinh
         */
        public function getItem($key, $default_val='')
        {
            return isset($this->config[$key]) ? $this->config[$key] : $default_val;
        }

        /**
         *  Set item config
         *  @param string
         *  @param string
         *  @desc ham set config  item, tham so truyen vao la ten cua config va gia tri cua no
         */
        public function setItem($key, $val)
        {
            $this->config[$key] = $val;
        }
    }
?>
