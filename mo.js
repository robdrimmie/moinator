(function(){

/* http://www.quirksmode.org/js/findpos.html */
function findPos(obj) {
  var curleft = curtop = 0;

  if (!obj.offsetParent) return;
  do {
    curleft += obj.offsetLeft;
	curtop += obj.offsetTop;

  } while (obj = obj.offsetParent);

  return [curleft,curtop];
}

/* 
   Learn DOM Manipulation from the book my friend co-wrote that I'm 
   tech reviewing!

   DOM Scripting: Web Design with JavaScript and the Document Object Model
   http://friendsofed.com/book.html?isbn=9781430233893
*/
var allImages = document.getElementsByTagName( 'img' ),
  body = document.getElementsByTagName( 'body' )[0],
  vOffset = 20,
  moBase = 'http://miscellanean.com/webapps/movember/images/',
  moExt = '.png',
  moNames = [ 'chaplin', 'dali', 'django', 'fumanchu', 'handlebar'
    , 'hogan', 'hungarian', 'khan', 'magnum', 'pencil', 'poirot'
    , 'porn', 'regular', 'walrus', 'zappa'
  ],
  toMo = [],
  randomMoIndex, 
  newMo, 
  position;

for( var imgIndex = 0; imgIndex < allImages.length; imgIndex++ ) {
    if( -1 !== allImages[imgIndex].src.indexOf( 'thumb_' ) ) {
        randomMoIndex = Math.floor( Math.random() * (moNames.length) );

        newMo = document.createElement("img");
        newMo.setAttribute("src", moBase + moNames[randomMoIndex] + moExt );
        body.appendChild( newMo );

        position = findPos( allImages[imgIndex] );
        newMo.style.position = 'absolute';
        newMo.style.top = (position[1] + vOffset) + "px"; 
        newMo.style.left = position[0] + "px";
        newMo.style.width = "50px";
        
        toMo[toMo.length] = newMo;        
    }
}

})();
