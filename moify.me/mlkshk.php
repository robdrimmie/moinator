<?php
require_once( 'mlkshk.config.php' );


//You may need to install HTTP_Reuqest2 and Crypt_HMAC2 via PEAR
require_once('HTTP/Request2.php');
require_once('HTTP/Request2/Observer/Log.php');
require_once('Crypt/HMAC2.php');


class Mlkshk 
{
  function __construct() {
    echo "newmlkshk";
  }
}

$mlkshk= new Mlkshk();
$foo = new OAuth( 
  MLKSHK_CONSUMER_KEY
  , MLKSHK_CONSUMER_SECRET
  , OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI
);
