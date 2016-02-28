<?php
define( 'AMP_DEBUG', true );

add_action("amp_enqueue_scripts",function(){

  amp_insert_css("font-google-1","https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en",'font');
  amp_insert_css("font-google-2","https://fonts.googleapis.com/icon?family=Material+Icons",'font');
  amp_insert_css("font-google-3","https://code.getmdl.io/1.1.1/material.grey-orange.min.css");
  amp_insert_css("template-style",get_amp_template_directory_url()."assets/css/style.css");

});

add_action( 'wp_enqueue_scripts', function(){

  wp_enqueue_style( 'material_normal-style', get_amp_template_directory_url()."assets/css/style-normal.css", array(), '3.7.3' );
  wp_enqueue_script( 'material_style', 'https://code.getmdl.io/1.1.1/material.min.js', array(), '3.7.3' );
  wp_dequeue_style('twentysixteen-style');
  wp_deregister_style('twentysixteen-style');

} , 99);
