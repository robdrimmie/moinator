$(document).ready( function() {
  $("#moification").hide();

  // Step 1: Retrieve the Twitter profile to pic. 
  // Display to user with a halo of mos
  $("#moify").submit( function() {
    if( '' == $("#twitter_username") ) {
      alert( "can't have an empty username" );
      return false;
    }

    $("#get_username").fadeOut("fast");

    var twitter_url = "https://api.twitter.com/1/users/profile_image?size=original&screen_name=";
    twitter_url += $("#twitter_username").val();

    $("#profile_pic").attr( "src", twitter_url );

    $("#moification").fadeIn("fast");


    $("#doit_twitter_username").val( $("#twitter_username").val() );
    return false;
  });

  // Step 2: user selects a mo, drags it onto the profile pic.
  // logic: loop through images, attach drag handler onto each that
  // stores  somewhere: mo and top/left.

  // Step 3: user saves mo'd profile pic, stored as image on server
  // and user is redirect to image url 
  $("#doit").submit( function() {
  });

});
