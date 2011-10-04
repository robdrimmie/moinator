<?php
require_once( 'imgur.config.php' );

class Imgur
{

  private $imgur_key = 'c02cf763a98928e08c922a64533a42e6';

  function __construct() {
    echo "newimgur";

    $img = imagecreatefromstring(file_get_contents(
      "badstache.png"
    ));
    
    ob_start();
    imagejpeg($img,null,80);
    $data = base64_encode(ob_get_clean());
    imagedestroy($img); 
    $request = array(
      'name' => 'moifyme'.time().'.jpg',
      'type' => 'base64',
      'title' => 'moifymetitle',
      'caption' => 'moifymecaption',
      'key' => $this->imgur_key,
      'image' => $data,
    );

    $curl = curl_init("http://api.imgur.com/2/upload.json");
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$request);
    $ret = json_decode(curl_exec($curl),true);

    var_dump( $ret );
  }
}

$imgur = new Imgur();
$foo = new OAuth( 
  IMGUR_CONSUMER_KEY
  , IMGUR_CONSUMER_SECRET
  , OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI
);
