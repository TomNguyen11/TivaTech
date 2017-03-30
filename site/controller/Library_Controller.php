<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Library_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // tao thu vien moi
            $this->library->load('upload');

            // goi den phuong thuc upload
            $this->library->upload->upload();
        }
    }
?>
