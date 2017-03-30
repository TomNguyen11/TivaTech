<?php
    if ( ! defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }

    class News_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Lay config co key la csrf_token_name
            echo '<h3>Token: csrf_token_name: '.$this->config->getItem('csrf_token_name').' </h3>';

            // Thay doi gia tri  cho csrf_token_name
            $this->config->setItem('csrf_token_name', 'new_token');

            echo '<h3>New Token: csrf_token_name: '.$this->config->getItem('csrf_token_name').'</h3>';

            // Tao cau hinh moi ten website_name
            $this->config->setItem('website_name', 'TivaTech.com');
            echo '<h3>Key website_name: '.$this->config->getItem('website_name').'</h3>';
        }

        public function detailAction()
        {
            echo '<h1>Detail Action</h1>';
        }
    }
?>
