<?php
    if(!defined('PATH_SYSTEM')) {
        die ('Bad requested!');
    }
    /**
     * [ckeditor Function create 1 editor]
     * @param  [string] $name    [textarea name]
     * @param  [string] $content [textarea content]
     * @return [string]          [script editor]
     */
    function ckeditor($name, $content) {
        $code = '';
        $code .= '<script src="public/editor/ckeditor/ckeditor.js" charset="utf-8"></script>';
        $code .= '<textarea name="'.$name.'" id="'.$name.'" rows="10" cols="100">'.htmlentities($content).'</textarea>';
        $code .= '<script>';
        $code .= 'config = {};
                config.filebrowserBrowseUrl = "public/editor/ckfinder/ckfinder.html";
                config.filebrowserImageBrowserUrl = "public/editor/ckfinder/ckfinder.html";
                config.filebrowserFlashBrowseUrl = "public/editor/ckfinder/ckfinder.html";
                config.height = 300;
                config.width = \'100%\';
                config.resize_enabled = true;
                config.language_list = [ \'en: English\',\'he:Hebrew:rtl\', \'pt:Portuguese\', \'de:German\', \'vi: Vietnamese\'];
                CKEDITOR.replace( \''.$name.'\', config);';
        $code .= '</script>';
        return $code;
    }
?>
