<?php
   $height = 0;
   header("Content-type: image/png");
   $string = $_REQUEST['text'];
   if (strlen($string) == 0){
     $string = $HTTP_SERVER_VARS['QUERY_STRING'];
     $string = urldecode($string);
   }

   $twitter_url = "https://api.twitter.com/1/users/profile_image?screen_name={$_GET['twitter_username']}&size=original";
   // this is badness. this call is rate limited, 150 per hour, and 
   // since it depends on a 302 redirect to get to the image file 
   // and I am not storing the image which means at least two requests
   // (get the type, then open it correctly)
   // better stuff required
   $avatartype =  exif_imagetype( $twitter_url );
   $size = getimagesize( $twitter_url );
   switch( $size["mime"] ) {
    case "image/gif":
      $im = imagecreatefromgif( $twitter_url );
      break;
    case "image/png":
      $im = imagecreatefrompng( $twitter_url );
      break;
    case "image/jpeg":
      $im = imagecreatefromjpeg( $twitter_url );
      break;
    default:
      var_dump( $avatartype );
      var_dump( IMAGETYPE_GIF );
      die( 'unknown image type' );
   }
   
//   $im    = imagecreatefrompng("./yellingbase.png");
   $stache = imagecreatefrompng( "./badstache.png" );
   $imwidth = $size[0];
   $imheight = $size[1];

   $dstx = ( $imwidth / 2 ) - 40;
   $dsty = ( ( $imheight / 3 ) * 2 ) - 22;
   
   switch( $_GET['twitter_username'] ) {
   case 'cutegecko':
     // 135, 210
     $dstx = 150;
     $dsty = 95;
     break;
   case 'seanyo':
     //210, 200
     $dstx = 193;
     $dsty = 160;
     break;
   case 'robdrimmie':
     //210, 200
     $dstx = 250;
     $dsty = 170;
     break;
   }
   imagecopy( $im, $stache, $dstx, $dsty, 0, 0, 80, 45 );

   imagepng($im);
   imagedestroy($im);
?>
