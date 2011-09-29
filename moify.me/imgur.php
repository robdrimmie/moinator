<?php
require_once( 'imgur.config.php' );

class Imgur
{
  function __construct() {
    echo "newimgur";
  }
}

$imgur = new Imgur();
$foo = new OAuth( 
  IMGUR_CONSUMER_KEY
  , IMGUR_CONSUMER_SECRET
  , OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI
);
