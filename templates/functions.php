<?php
define( 'AMP_DEBUG', true );

add_action("amp_enqueue_scripts",function(){

  amp_insert_css("font-google-1","https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en",'font');
  amp_insert_css("font-google-2","https://fonts.googleapis.com/icon?family=Material+Icons",'font');
  amp_insert_css("material_style-1","https://code.getmdl.io/1.1.1/material.grey-orange.min.css");
  amp_insert_css('material_style-2','https://code.getmdl.io/1.1.1/material.min.js' );
  amp_insert_css("template-style-1",get_amp_template_directory_url()."assets/css/style.css");

});
