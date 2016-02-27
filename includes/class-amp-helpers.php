<?php
// function get file to dom

// equipment js
// equipment css
class project_amp_helpers {

  public function __construct() {

  }

  public function equipment_js($name,$file,$version){
    global $tags , $eq_js , $eq_css;
    $eq_js = "<script async src='{$file}'></script>";
  }

  public function equipment_css($name,$file,$version){
    global $tags , $eq_js , $eq_css;
    $eq_css = "";

  }

  public function register_tags($tag,$class){
    global $tags , $eq_js , $eq_css;
    $tags = "";
    echo "<style amp-custom>";
    foreach($eq_css as $file){
      
    }
    echo "</style>"
  }

  public function compress ($code) {
    $code = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code);
    $code = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $code);
    $code = str_replace('{ ', '{', $code);
    $code = str_replace(' }', '}', $code);
    $code = str_replace('; ', ';', $code);

    return $code;
  }

  public function css_inline() {

  }

}
