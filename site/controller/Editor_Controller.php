<?php
    if (!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    class Editor_Controller extends TT_Controller
    {
        public function indexAction()
        {
            // Loade helper
            $this->helper->load('editor');

            // Goi den ham string_to_int
            //echo string_to_int('TivaTech');
            $editor = ckeditor('editor1', htmlentities('<p>Content of this post</p>'));
        }
    }
?>
