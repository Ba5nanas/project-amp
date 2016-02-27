<?php
define( 'AMP_DEBUG', false );

add_action("amp_enqueue_scripts",function(){
  amp_insert_css("first-item3","http://php.net/cached.php?t=1429291204&f=/styles/theme-base.css");
  amp_insert_js("youtube","https://cdn.ampproject.org/v0/amp-youtube-0.1.js","amp-youtube");
});
