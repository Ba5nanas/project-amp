<?php

function amp_head(){
  do_action("amp_head");
}

function amp_footer(){
  do_action("amp_footer");
}

function amp_get_header($name=""){
  if(is_amp_template()){
    get_template_part("amp/header",$name);
  }else{
    $item_name = "";
    if(!empty($name)){
      $item_name = "-{$name}";
    }
    require(AMP__DIR__."/templates/header{$item_name}.php");
  }
}

function amp_get_footer($name=""){
  if(is_amp_template()){
    get_template_part("amp/footer",$name);
  }else{
    $item_name = "";
    if(!empty($name)){
      $item_name = "-{$name}";
    }
    require(AMP__DIR__."/templates/footer{$item_name}.php");
  }
}

function amp_insert_js($name,$file,$tag){
  global $eq_js;
  if(!isset($eq_js[$name])){
    $eq_js[$name] = array("file"=>$file,"tag"=>$tag);
  }
}

function amp_insert_css($name,$file,$type=""){
  global $eq_css;
  if(!isset($eq_css[$name])){
    $eq_css[$name] = array('url'=>$file,'type'=>$type);
  }
}

function amp_run_script(){
  global $eq_js , $eq_css , $wp_filesystem;
  require_once (ABSPATH . '/wp-admin/includes/file.php');
  WP_Filesystem();

  ob_start();
  if(is_array($eq_css) && sizeof($eq_css) > 0){
    foreach($eq_css as $files){
      $item = array();
      $file = $files['url'];
      if($files['type'] != "font"){
        preg_match('/wp-content\/(\S+)/i', $file, $item);
        $item_file = ABSPATH.$item[0];
        if(is_file($item_file)){
          require_once($item_file);
        }else{

          $file_explode = explode("/",$file);
          $count = sizeof($file_explode) - 1;
          $file_name = $file_explode[$count];
          $folder_cache = get_amp_template_directory()."cache-css";
          if(is_file($folder_cache."/".$file_name)){
            require_once($folder_cache."/".$file_name);
          }else{
            $text = $wp_filesystem->get_contents($file);
            if(is_dir($folder_cache)){
              $wp_filesystem->put_contents($folder_cache."/".$file_name,$text);
            }else{
              wp_mkdir_p($folder_cache);
            }
            if(!empty($text)){
              echo $text;
            }
          }
        }
      }

    }
    $out = ob_get_clean();
    $out = compress($out);
    echo "<style amp-custom>";
    echo $out;
    echo "</style>";

    foreach($eq_css as $files){
      if($files['type'] == "font"){
        echo "<link href='{$files['url']}' rel='stylesheet' type='text/css'>";
      }
    }
  }

  if(is_array($eq_js) && sizeof($eq_js) > 0){
    foreach($eq_js as $files){

        echo "<script async custom-element='{$files['tag']}' src='{$files['file']}'></script>";
      
    }
  }

}

function amp_get_sidebar($name=""){
  if(is_amp_template()){
    get_template_part("amp/sidebar",$name);
  }else{
    $item_name = "";
    if(!empty($name)){
      $item_name = "-{$name}";
    }
    require(AMP__DIR__."/templates/sidebar{$item_name}.php");
  }
}

function amp_get_template_part($slug,$name="") {
  if(is_amp_template()){
    get_template_part("amp/{$slug}",$name);
  }else{
    $item_name = "";
    if(!empty($name)){
      $item_name = "-{$name}";
    }
    require(AMP__DIR__."/templates/{$slug}{$item_name}.php");
  }
}

function is_amp(){
  if(amp_check_mobile()){
    return true;
  }
  return false;
}

function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ',' '), '', $buffer);
    return $buffer;
}

function amp_register_tag($old_tag,$new_tag,$attr=array(),$extension=false,$name_extension=""){
  global $amp_tags;
  $amp_tags->register_tags($old_tag,$new_tag,$attr,$extension,$name_extension);
}

function amp_register_extension($name,$extension){
  global $amp_tags;
  $amp_tags->register_extension($name,$extension);
}
