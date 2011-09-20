$(document).ready( function() {
  console.log( 'foo' );

  
  $("#moify").submit( function() {
    alert( 'foo' );
    return false;
  });
});

