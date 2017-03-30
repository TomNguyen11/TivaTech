<?php
    /**
     * @package TivaTech
     * @author Tom Nguyen
     * @email nhoctom0811@gmail.com
     * @filesource system/core/loader/TT_View_Loader.php
     */
    class TT_View_Loader
    {
        /**
         * @desc bien luu tru cac view da load
         */
        private $__content = array();

        /**
         * Load view
         *
         * @param string
         * @param array
         * @desc ham load view, tham so truyen vao la ten cua view va du lieu truyen vao
         *
         */
        public function load($view,  $data = array())
        {
            // Chuyen mang du lieu thanh tung bien
            extract($data);

            // Chuyen noi dung view thanh bien thay vi in ra bang cach dung ab_start()
            ob_start();
            require_once PATH_SITE.'/view/'.$view.'.php';
            $content = ob_get_contents();
            ob_end_clean();

            // Gan noi dung vao danh sach view da loa
            $this->__content[] = $content;
        }
        public function loadAdmin($view,  $data = array())
        {
            // Chuyen mang du lieu thanh tung bien
            extract($data);

            // Chuyen noi dung view thanh bien thay vi in ra bang cach dung ab_start()
            ob_start();
            require_once PATH_ADMIN.'/view/'.$view.'.php';
            $content = ob_get_contents();
            ob_end_clean();

            // Gan noi dung vao danh sach view da loa
            $this->__content[] = $content;
        }
        /**
         * show view
         *
         * @desc ham hien thi toan bo view da load, duoc dung o controller
         */
        public function show()
        {
            foreach ($this->__content as $html) {
                echo $html;
            }
        }
    }
?>
