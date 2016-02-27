<?php
/**
 * Plugin Name: PROJECT AMP
 * Description: AMP Support on Theme
 * Plugin URI: https://github.com/Ba5nanas/project-amp/
 * Author: Ba5nanas
 * Author URI: http://themeforest.net/user/ba5nanas
 * Version: 0.0.1
 * Text Domain: amp
 * Domain Path: /languages/
 * License: GPLv2 or later
 */

define( 'AMP__FILE__', __FILE__ );
define( 'AMP__DIR__', dirname( __FILE__ ) );

// load includes
add_action('init','amp_init_first',1);
function amp_init_first(){

  add_action( 'amp_load_library' , 'amp_load_library' );
  add_action( 'amp_load_module' , 'amp_load_module' );
  add_action( 'amp_load_helpers' , 'amp_load_helpers' );
  add_action( 'amp_load_init' , 'amp_load_init' );

  add_action( 'init', 'amp_init' , 99);
  if(is_amp_template()){
    $dirname_amp = get_amp_template_directory();
    if(is_file("{$dirname_amp}functions.php")){
      // load functions.php on folder theme
      include("{$dirname_amp}functions.php");
    }
  }else{
    $dirname_amp = get_amp_template_directory();
    include(AMP__DIR__."/templates/functions.php");
  }

}

function is_amp_template(){
  $dirname = get_template_directory();
  if(is_dir("{$dirname}/amp")){
    return true;
  }else{
    return false;
  }
}

function amp_init(){
  global $amp_tags;
  // load Library
  do_action('amp_load_library');
  $amp_tags = new amp_tags();
  do_action('amp_load_module');
  do_action('amp_load_helpers');
  do_action('amp_load_init');
  // amp action
  add_action( 'amp_head' , 'amp_run_script' );
  add_action( 'template_redirect', 'amp_action' );

}

function get_amp_template_directory(){
  $dirname = get_template_directory();
  if(is_dir("{$dirname}/amp")){
    // get folder on theme
    return get_template_directory()."/amp/";
  }else{
    // get folder on plugin
    return AMP__DIR__."/templates/";
  }
}

function get_amp_template_directory_url(){
  $dirname = get_template_directory();
  if(is_dir("{$dirname}/amp")){
    // get folder on theme
    return get_template_directory_uri()."/amp/";
  }else{
    // get folder on plugin
    return plugins_url()."/template/";
  }
}

function amp_action(){
  global $amp_tags;


  $mytheme = wp_get_theme();
  $amp_template = amp_template_part();



  if($amp_template['theme'] && is_file($amp_template['template'])){

    // action pre function
    do_action("project-amp-theme-functions");


  } elseif(is_file($amp_template['template'])) {


  }
  //do_action("insert_script");
  //$amp_tags->process_dom();

  if(amp_check_mobile() && is_file($amp_template['template'])){
    do_action("amp_enqueue_scripts");
    $amp_tags->process_dom();
    // render
    amp_render($amp_template['template']);
  }

}

// check mobile working
function amp_check_mobile(){
  global $detect;
  if (defined('AMP_DEBUG')) {
    return true;
  }
  if($detect->isMobile() || $detect->isTablet() || ($detect->isMobile() && !$detect->isTablet()) ){
    return true;
  }
}

function amp_load_library(){
  global $detect;
  require_once(AMP__DIR__."/core/libs/Mobile_Detect.php");
  require_once(AMP__DIR__."/core/class-amp.php");
  require_once(AMP__DIR__."/core/class-amp-tags.php");
  $detect = new Mobile_Detect;
}

function amp_load_module(){
  require_once(AMP__DIR__."/core/amp-woocommerce.php");
  require_once(AMP__DIR__."/core/amp-bbpress.php");
  require_once(AMP__DIR__."/core/amp-buddypress.php");
}

function amp_load_helpers(){

  require_once(AMP__DIR__."/core/amp-helpers.php");
  require_once(AMP__DIR__."/core/amp-template-loader.php");
}

function amp_load_init(){
  require_once(AMP__DIR__."/core/amp-init-tags.php");
}
