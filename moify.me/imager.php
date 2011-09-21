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

if( array_key_exists( 'twitter_username', $_GET ) ) {
  $twitter_username = $_GET['twitter_username'];
} else {
  $twitter_username = 'seanyo';
}

$twitter_url = "https://api.twitter.com/1/users/profile_image?screen_name={$twitter_username}&size=original";
// this is badness. this call is rate limited, 150 per hour, and 
// since it depends on a 302 redirect to get to the image file 
// and I am not storing the image which means at least two requests
// (get the type, then open it correctly)
// better stuff required
$avatartype =  exif_imagetype( $twitter_url );
$size = getimagesize( $twitter_url );
$imwidth = $size[0];
$imheight = $size[1];
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
  var_dump( $_GET );
  var_dump( $_REQUEST );
  var_dump( $twitter_url );
  var_dump( $avatartype );
  die( 'unknown image type' );
}

if( array_key_exists( 'mo_file', $_GET ) ) {
  $mo_file = $_GET[ "mo_file" ];
} else {
  $mo_file = "badstache.png";
}
$stache = imagecreatefrompng( $mo_file );

if( array_key_exists( 'mo_x', $_GET ) ) {
  $mo_x = $_GET[ 'mo_x' ];
} else {
  $mo_x = ( $imwidth / 2 ) - 40;
}

if( array_key_exists( 'mo_y', $_GET ) ) {
  $mo_y = $_GET[ 'mo_y' ];
} else {
  $mo_y = ( ( $imheight / 3 ) * 2 ) - 22;
}

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
imagecopy( $im, $stache, $mo_x, $mo_y, 0, 0, 80, 45 );

header("Content-type: image/png");
imagepng($im);
imagedestroy($im);
?>
