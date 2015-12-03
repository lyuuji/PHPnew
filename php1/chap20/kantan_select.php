<meta charset='UTF-8'>
<?php
require_once("data/db_info.php");
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗です");
print "接続OK！<br>";
mysql_select_db('db1');
$re = mysql_query("select * from tbk order by bang");
while($kekka = mysql_fetch_array($re)){
  print htmlspecialchard$kekka[0];
  print ":";
  print htmlspecialchard$kekka[1];
  print ":";
  print htmlcpecialchard$kekka[2];
  print "<br>";
}
mysql_close($s);
print "<br><a href='kantan.html'>トップメニューに戻ります</a>";
?>
