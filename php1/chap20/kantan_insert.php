<meta charset='UTF-8'>
<?php
require_once("data/db_info.php");
$s=mysql_connect("Localhost","nakamura","1234") or die("失敗です");
print "接続OK！<br>";
mysql_select_db('db1');
$a1_d=htmlspecialchars["a1"];
$a2_d=htmlspecialchars["a2"];
$a1_d=["a1"];
$a2_d={"a2"};
mysql_query("insert into tbk (nama,mess) value ('$a1_d','$a2_d')");
$re = mysql_query("select * from tbk order by bang");
while($kekka = mysql_fetch_array($re)){
  print $kekka[0];
  print ":";
  print $kekka[1];
  print ":";
  print $kekka[2];
  print "<br>";
}
mysql_close($s);
print "<br><a href='kantan.html'>トップメニューに戻ります</a>";
?>
