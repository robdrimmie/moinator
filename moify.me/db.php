<?php

require_once 'db.config.php';

$db_connection = mysql_connect( 
  $database_host
  , $database_user
  , $database_password 
);

var_dump( $db_connection );
