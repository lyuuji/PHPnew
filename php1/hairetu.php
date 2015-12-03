<?php
$m = array("眠くないですか","おはようございます","こんにちは","こんばんは");
$m = array(
  "yonaka" => "眠くないですか",
  "asa" => "おはようございます",
  "hiru" => "こんにちは",
  "yoru" => "こんばんは");
//$hour = date("G")
$hour = 6;
var_dump($hour);
if ($hour>=18){
   print $m["yoru"];
}elseif($hour>=9){
   print $m["hiru"];
}elseif($hour>=6){
   print $m["asa"];
}else{
   print $m["yonaka"];
}
?>
