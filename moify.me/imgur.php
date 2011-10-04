<?php
require_once( 'imgur.config.php' );

class Imgur
{

  private $imgur_key = 'c02cf763a98928e08c922a64533a42e6';

  function __construct() {
  }

  function image_to_base64( $image ) {
    ob_start();
    imagejpeg( $image, null, 80 );
    $data = base64_encode( ob_get_clean() );

    return $data;
  }

  function upload( $image, $title = "moifymetitle", $caption = "moifymecaption" ) {
    $request = array(
      'name' => 'moifyme' . time() . '.jpeg',
      'type' => 'base64',
      'title' => $title,
      'caption' => $caption,
      'key' => $this->imgur_key,
      'image' => $this->image_to_base64( $image )
    );

    $curl = curl_init("http://api.imgur.com/2/upload.json");
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$request);
    $ret = json_decode(curl_exec($curl),true);
    var_dump( $ret );
    die();
    return $ret;
  }
}
