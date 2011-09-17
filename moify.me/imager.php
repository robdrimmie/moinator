<?php
   require("wrap.php");
   $height = 0;
   header("Content-type: image/png");
   $string = $_REQUEST['text'];
   if (strlen($string) == 0){
     $string = $HTTP_SERVER_VARS['QUERY_STRING'];
     $string = urldecode($string);
   }

   $im    = imagecreatefrompng("./yellingbase.png");
   $stache = imagecreatefrompng( "./badstache.png" );

   imagecopy( $im, $stache, 0, 10, 0, 0, 80, 45 );

   imagepng($im);
   imagedestroy($im);
?>
