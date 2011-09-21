<?php
// The imager creates a new image based on the combination
// of a user's Twitter profile image and their selected
// mo and the placement of the mo.
//
// The image is stored in the database and a unique identifier
// is created for it. Non-sequential 'cause I don't want people
// creeping the system, but I also don't want it to be like a 
// huge-ass 24-character hash string so I will see what I can do 
// about that.
//
// Four parameters are required:
//   twitter_username   string    The user's twitter username
//   mo_file            string    The filename of the selected mo
//   mo_x               integer   horizontal offset (left = 0) of the mo relative to the profile picture
//   mo_y               integer   vertical offset (top = 0) of the mo relative to the profile picture

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
