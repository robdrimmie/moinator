<?php
require_once 'db.config.php';

class Moify_Db
{

  protected $_conn;

  public function __construct( $host = MOIFY_DB_HOST, $user = MOIFY_DB_USER, $pw = MOIFY_DB_PASSWORD, $db = MOIFY_DB_NAME ) {
    $conn = mysqli_connect( $host, $user, $pw, $db );

    if( !$conn ) {
      die( 'Error connecting to mysql' );
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
  public function add( $twitter_username, $imgur_of_original, $imgur_of_moified, $chosen_mo, $mo_top, $mo_left ) {
    // add a mo to the table
    $stmt = mysqli_prepare( $this->_conn, 
      'INSERT INTO moify ( twitter_username, imgur_of_original, imgur_of_moified, chosen_mo, mo_top, mo_left )
      VALUES( ?, ?, ?, ?, ?, ? )' );
    $stmt->bind_param( 'ssssii', $twitter_username, $imgur_of_original, $imgur_of_moified, $chosen_mo, $mo_top, $mo_left );

    $stmt->execute();

    $stmt->close();

  }

}
