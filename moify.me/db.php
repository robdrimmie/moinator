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

  /*
   * storage table
   *
   * id
   * twitter name
   * imgur to original
   * imgur to mo
   * mo img
   * top
   * left
   */
  public function add(
    $twitter_username
    , $imgur_of_original
    , $imgur_of_moified
    , $chosen_mo
    , $mo_top
    , $mo_left ) {
    // add a mo to the table
  }

}

require_once 'db.config.php';

$mdb = new Moify_Db( $database_host, $database_user, $database_password );
var_dump( $mdb );
