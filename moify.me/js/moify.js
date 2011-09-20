$(document).ready( function() {
  $("#moification").hide();

  $("#moify").submit( function() {
    if( '' == $("#twitter_username") ) {
      alert( "can't have an empty username" );
      return false;
    }

    $("#get_username").fadeOut("fast");

    $.ajax({
      url: 'imager.php',
      data: { twitter_username: $("#twitter_username").val() }, 
      success: function( data ) {
        var twimage = $("#moification").add("img");
//        twimage.attr("src") = data;
        console.log( data );

        $("#moification").fadeIn("slow"); 
        return false;
      },

      error: function( data, txt, thr ) {
        $("#get_username").fadeIn("fast");
        console.log( 'err' );
        console.log( data );
        console.log( txt );
        console.log( thr );
        return false;
      } 
    });
    
    return false;
  });

});

