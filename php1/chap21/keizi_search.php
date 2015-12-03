<?php
//データベース情報などの読み込み
require_once('data/db_info.php');

//データベースへの接続、データベース選択
$s = mysql_connect($SERV, $USER, $PASS) or die('失敗しました');
mysql_select_db($DBNM);

//print 'OK!';

//タイトルなどの表示
print <<<eot1
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <title>SQLカフェの検索ページ</title>
</head>
<body bgcolor='orange'>
 <hr>
 <font size='5'>(検索結果はこちら)</font>
 <br>
</body>
</html>
eot1;

//検索文字列を取得してタグを排除
$se_d = isset($_GET['se']) ? htmlspecialchars($_GET['se']) :null;

//検索文字列($se_d)にデータがあれば検索処理
if($se_d<>""){
//検索のSQL文 テーブルtbj1にtbj0を結合
$str = <<<eot2
select tbj1.bang, tbj1.nama,tbj1.mess,tbj0.sure
from tbj1 join tbj0 on tbj1.guru = tbj0.guru
where tbj1.mess like "%$se_d%"
eot2;

//検索クエリを実行
$re = mysql_query($str);
while($kekka=mysql_fetch_array($re)){
 print " $kekka[0] : $kekka[1] : $kekka[2] ( $kekka[3])";
 print "<br><br>";
}

}


//データベース切断
mysql_close($s);

//検索文字列入力表示、トップへのリンク
print <<<eot3
<hr>
メッセージに含まれる文字を入力してください！
<br>
<form method = "GET" action = "keizi_search.php">
検索する文字
<input type = "text" name = "se">
<br>
<input type = "submit" value = "検索">
</form>
<br>
<a href = "keizi_top.php">
スレッド一覧に戻る
</a>
</body>
</html>
eot3;
?>

