$(document).ready( function() {
  console.log( 'foo' );
});

$("#imager").submit( function( event ) {
  alert( 'foo' );
  event.stopPropagation();
  return false;
});
