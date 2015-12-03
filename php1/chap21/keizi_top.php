<?php

//データベース情報などの読み込み
require_once("data/db_info.php");

//データベースへ接続、データベース選択
$s = mysql_connect($SERV,$USER,$PASS) or die("失敗しました");
mysql_select_db($DBNM);

// タイトル、画像などの表示
print <<<eot1
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>SQLカフェのページ</title>
</head>
<body bgcolor='lightsteelblue'>
  <img src="pic/oya.gif" alt="">
  <font size='7' color='indigo'>
  SQLカフェだよ〜
  </font>
  <br><br>
    見たいスレッドの番号をクリックしてください
  <hr>
  <font size='5'>
    (スレッド一覧)
  </font>
 </body>
 </html>
eot1;

//クライアントIPアドレスの取得
$ip = getenv('REMOTE_ADDR');

//スレッドのタイトル(su)にデータがあればtbj0に挿入
$su_d = isset($_GET['su'])? htmlspecialchars($_GET['su']):null;
//var_dump($su_d);
if($su_d<>''){
  mysql_query("insert into tbj0(sure, niti, aipi) values('$su_d', now(), '$ip')");
}

// tbj0の全データ抽出
$re = mysql_query('select * from tbj0');
while($kekka = mysql_fetch_array($re)){
   print <<<eot2
<a href = "keizi.php?gu=$kekka[0]">$kekka[0] $kekka[1]</a>
<br>
$kekka[2]作成<br><br>
eot2;
}

//データベース切断
mysql_close($s);


//スレッド名入力表示、 トップなどへのリンク


print <<<eot3
<hr>
<font size='5'>
(スレッド作成)
</font>
<br>
新しくスレッドを作るときはここでどうぞ
<br>
<form method='get' action="keizi_top.php">
新しく作るスレッドのタイトル
<input type="text" name="su" size='50'>
<br>
<input type="submit" value="作成">
</form>
<hr>
<font size='5'>
(メッセージ検索）
</font>
<a href="keizi_search.php">検索するときはここをクリック</a>
<hr>
</body>
</html>
eot3;
