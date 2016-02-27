<?php
require_once(AMP__DIR__."/core/embeds/class-youtube.php");
// normal
amp_register_extension("youtube","amp_youtube");
amp_register_tag("img","amp-img",array(),false,'');
amp_register_tag("iframe","amp-youtube",array(),true,'youtube');
