<?php

   /**
   *sk89q at yahoo dot com
   *21-Aug-2003 10:18
   *[NEW VERSION] Fixed bottom line irregularness (didnt take into effect leading); Vertical alignment added (inspiration by those people below)
   *
   *resource imagestringbox ( resource image, int font, int left, int top, int right, int bottom, int align, int valign, int leading, string text, int color )
   *
   *This function allows you to draw text inside a box.    It will automatically wrap at the end of the line and cut the text if it is further than the bottom line. The text can be aligned vertically and horizontally. Manual new lines can be made by using \n (note that you can not escape that symbol though). The space between lines can also be set using leading (negative values are accepted).
   *
   *Remember to visit my site: http://therisenrealm.vze.com :)
   *
   **/

   define("ALIGN_LEFT", 0);
   define("ALIGN_CENTER", 1);
   define("ALIGN_RIGHT", 2);
   define("VALIGN_TOP", 0);
   define("VALIGN_MIDDLE", 1);
   define("VALIGN_BOTTOM", 2);

   function imagestringbox(&$image, $font, $left, $top, $right, $bottom, $align, $valign, $leading, $text, $color) {
       // Get size of box
       $height = $bottom - $top;
       $width = $right - $left;

       // Break the text into lines, and into an array
       $lines = wordwrap($text, floor($width / imagefontwidth($font)), "\n", true);
       $lines = explode("\n", $lines);

       // Other important numbers
       $line_height = imagefontheight($font) + $leading;
       $line_count = floor($height / $line_height);
       $line_count = ($line_count > count($lines)) ? (count($lines)) : ($line_count);

       // Loop through lines
       for ($i = 0; $i < $line_count; $i++) {
           // Vertical Align
           switch ($valign) {
               case VALIGN_TOP: // Top
                   $y = $top + ($i * $line_height);
                   break;
               case VALIGN_MIDDLE: // Middle
                   $y = $top + (($height - ($line_count * $line_height)) / 2) + ($i * $line_height);
                   break;
               case VALIGN_BOTTOM: // Bottom
                   $y = ($top + $height) - ($line_count * $line_height) + ($i * $line_height);
                   break;
               default:
                   return false;
           }

           // Horizontal Align
           $line_width = strlen($lines[$i]) * imagefontwidth($font);
           switch ($align) {
               case ALIGN_LEFT: // Left
                   $x = $left;
                   break;
               case ALIGN_CENTER: // Center
                   $x = $left + (($width - $line_width) / 2);
                   break;
               case ALIGN_RIGHT: // Right
                   $x = $left + ($width - $line_width);
                   break;
               default:
                   return false;
           }

           // Draw
           imagestring($image, $font, $x, $y, $lines[$i], $color);
       }

       return $image;
   }


	function imagestringheight($font, $left, $top, $right, $bottom, $align, $valign, $leading, $text, $color) {
	       // Get size of box
	       $height = $bottom - $top;
	       $width = $right - $left;

	       // Break the text into lines, and into an array
	       $lines = wordwrap($text, floor($width / imagefontwidth($font)), "\n", true);
	       $lines = explode("\n", $lines);

	       // Other important numbers
	       $line_height = imagefontheight($font) + $leading;
	       $line_count = floor($height / $line_height);
	       $line_count = ($line_count > count($lines)) ? (count($lines)) : ($line_count);

       	   return $line_count*$line_height;
       	   }

?>