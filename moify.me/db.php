<?php


class Moify_Db
{

  protected $_conn;
  
  public function __construct( $host, $user, $pw ) {
    $conn = mysql_connect( $host, $user, $pw );
    
    if( !$conn ) {
      die( 'Error connecting to mysql' );
      var_dump( $conn );
    }

    $this->_conn = $conn;
  }

}

require_once 'db.config.php';

$mdb = new Moify_Db( $database_host, $database_user, $database_password );
var_dump( $mdb );
