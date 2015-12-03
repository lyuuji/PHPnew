<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>SQLカフェのページ</title>
</head>
<body bgcolor="green">
<?php


$mozi =<<<eot
 SQLへようこそ<br>
 ２行目に表示させたい<br>
 ３行目に表示させたい<br>
 <u>アンダーライン</u><br>
 <b>太字</b><br>
 <i>イタリック</i><br>
 <a href="http://softbank.co.jp">ソフトバンク株式会社</a><br>
 <img src="oya.gif" alt="">
eot;


print ($mozi);
//print $mozi;
?>
</body>
</html>


