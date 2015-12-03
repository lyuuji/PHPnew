<meta charset='UTF-8'>
<?php
require_once("data/db_info.php");
$s=mysql_connect("Localhost","nakamura","1234") or die("失敗です");
print "接続OK！<br>";
mysql_select_db('db1');
$b1_d=$_POST["b1"];

if(preg_match("/[^0-9]/",$b1_d)){
    print "<font color='red'>数字以外は入力しないで！！</font><br>";
}else{
    mysql_query("delete from tbk where bang=$b1_d");
}

//mysql_query("delete from tbk where bang=$b1_d");
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
