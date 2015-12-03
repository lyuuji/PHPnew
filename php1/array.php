<?php
$m[]="Dragon";
$m[]="ネズミ";
$m[]="トラ";
$m[]="ウシ";
$m[]="ウサギ";

$n = array("ネズミ","ウシ","トラ","ウサギ","Doragon");


print_r($m);
print "<br>";

$m[] = "ネズミ";
$m[] = "ウシ";
$m[] = "トラ";
$m[] = "ウサギ";
$m[] = "Doragon";

print_r($m);
print "<br>";

ksort($m);

print_r($m);
print "<br>";

asort($m);

print_r($m);
print "<br>";
