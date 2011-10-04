<?php

define( 'MLKSHK_CONSUMER_KEY','2M-1W' );
define( 'MLKSHK_CONSUMER_SECRET', 'd7cfe84884aa926da927ed29b55f84c5' );
define( 'MLKSHK_REDIRECT_URL', 'http://localhost/moify/mlkshkcallback.php' );

//other API urls
define( 'AUTHENTICATION_URL',
  sprintf( "https://mlkshk.com/api/authorize?response_type=code&client_id=%s"
           , API_KEY
  )
);

define('ACCESS_TOKEN_URL','https://mlkshk.com/api/token');

define('NONCE_SALT','Somethinguniqueorrandom.'); //Salt for your nonce.

//this is the resource we're going to get info on via sharedfile
define('RESOURCE_URL','https://mlkshk.com/api/sharedfile/GA4');

