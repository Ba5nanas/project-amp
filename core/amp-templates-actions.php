<?php
global $wp_admin_bar;


//wp_admin_bar_render();

add_action( 'amp_footer', 'wp_admin_bar_render', 99 );

//echo plugins_url("assets/css/dashicons.css",dirname(__FILE__));
amp_insert_css("dashicons",plugins_url("core/assets/css/dashicons.css",dirname(__FILE__)),'font');


function disable_new_content() {
	global $wp_admin_bar;
  echo "Test";
}

add_action( 'add_admin_bar_menus', 'disable_new_content' , 99 );


add_action("amp-before-custom-css",function(){
  global $wp_admin_bar;
  require_once(ABSPATH."wp-includes/css/admin-bar.min.css");
});
