<?php
/*
$meals['Walnut Bun'] = '$3.95';
$hosts['www.example.com'] = 'web site';

print "A Walnut Bun costs {$meals['Walnut Bun']}.";
print "www.example.com is a {$hosts['www.example.com']}.";

*/
$a = array(1,2,3,4,5);
print_r($a);
print '<br>';

unset($a[3]);
print_r($a);
print '<br>';

$a[0] = 0;
$a[1] = '';
print_r($a);
print '<br>';

$a[3] = 10;
print_r($a);
print '<br>';
