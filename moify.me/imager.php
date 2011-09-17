<?php
   require("wrap.php");
   $height = 0;
   header("Content-type: image/png");
   $string = $_REQUEST['text'];
   if (strlen($string) == 0){
     $string = $HTTP_SERVER_VARS['QUERY_STRING'];
     $string = urldecode($string);
   }

   if( isset( $_REQUEST[ 'skot' ] ) )
   {
     $im    = imagecreatefrompng("./yellingskot.png");
     $text  = imagecolorallocate($im, 0, 0, 0);
     $border = imagecolorallocate($im, 0, 0, 0);
     $bubble = imagecolorallocate($im, 255, 255, 255);
     $transfill = imagecolorallocate($im, 255, 255, 255);
     /*
     $text  = imagecolorallocate($im, 255, 255, 255);
     $border = imagecolorallocate($im, 255, 255, 255);
     $bubble = imagecolorallocate($im, 0, 0, 0);
     $transfill = imagecolorallocate($im, 254, 254, 254);
     */
   } else if( isset( $_REQUEST['drobo'] ) )
   {
     $im  = imagecreatefrompng("./yellingdrobo.png");
     $text = imagecolorallocate($im, 0, 0, 0);
     $order = imagecolorallocate($im, 0, 0, 0);
     $bubble = imagecolorallocate($im, 255, 255, 255);
     $transfill = imagecolorallocate( $im, 255, 255, 255);
   } else {
     $im    = imagecreatefrompng("./yellingbase.png");
     $text  = imagecolorallocate($im, 0, 0, 0);
     $border = imagecolorallocate($im, 0, 0, 0);
     $bubble = imagecolorallocate($im, 255, 255, 255);
     $transfill = imagecolorallocate($im, 255, 255, 255);
   }
   imagecolortransparent($im, $transfill);
   $px    = (imagesx($im) - 7.5 * strlen($string)) / 2;
   $height = imagestringheight(3, 10, 10, 90, 140, ALIGN_LEFT, VALIGN_TOP, 2, $string, $text);
   $string = str_replace('\\\'','\'',$string);
   $string = strtoupper( trim( $string ) );
   imagestringbox($im, 3, 10, 10, 90, 140, ALIGN_LEFT, VALIGN_TOP, 2, $string, $text);

   $height = imagestringheight(3, 10, 10, 90, 140, ALIGN_RIGHT, VALIGN_TOP, 2, $string, $text);


   imagearc($im, 10, 10, 10, 10, 180, 270, $border);
   imagearc($im, 90, 10, 10, 10, 270, 0, $border);
   imagearc($im, 10, $height+10, 10, 10, 90, 180, $border);
//   imagearc($im, 90, $height+10, 10, 10, 0, 90, $border);
   imageline($im, 5, 10, 5, $height+10, $border);
   imageline($im, 10, 5, 90, 5, $border);
//   imageline($im, 95, 10, 95, $height+10, $border);
   imageline($im, 95, 10, 100, 75, $border);
   imageline($im, 90, $height+15, 100, 75, $border);
   imageline($im, 10,$height+15, 90, $height+15, $border);
   imagefill($im, 0, 0, $bubble);
   imagepng($im);
   imagedestroy($im);
?>
