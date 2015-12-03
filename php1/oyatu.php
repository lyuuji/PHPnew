<?php
$hour = date("G");
var_dump($hour);
switch ($hour) {
  case 10:
   print "10時のおやつです";
   break;
  case 15:
   print "３時のおやつです";
   break;
  default:
   print "おやつではありません";
}
?>
