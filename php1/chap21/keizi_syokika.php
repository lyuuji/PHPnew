<?php

//データベース情報などの読み込み
require_once("data/db_info.php");

//データベースへ接続、データベース
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗しました");

mysql_select_db($DBNM);

mysql_query('delete from tbj0');
mysql_query('delete from tbj1');
mysql_query('alter table tbj0 auto_increment = 1');
mysql_query('alter table tbj1 auto_increment = 1');

print "SQLカフェのテーブルを初期化しました";

mysql_close($s);

?>

