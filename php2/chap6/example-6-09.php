<meta charset='utf-8'>
<?php

$sweets = array('Sesame Seed Puff','Coconut Milk Gelatin Square',
                 'Brown Sugar Cake','Sweet Rice and Meat');

// Logic to do the right thing based on 
// the hidden _submit_check parameter
if (array_key_exists('_submit_check', $_POST)) {
    // If validate_form() returns errors, pass them to show_form()
    //サブミットされた場合 
    if ($form_errors = validate_form()) {
    //エラーメッセージがあれば、エラーメッセージ付きの
    //フォーム表示
        show_form($form_errors);
    } else {
    //エラーメッセージがなければ処理に進む
        process_form();
  }  
} else {
//サブミットされていない場合
//フォームを表示
show_form();
}
// Do something when the form is submitted
function process_form() {
     print "Hello, ". $_POST['my_name'];
     print '<br>';
     print "あなたの年齢は、 {$_POST['my_age']}歳ですね";
     print '<br>';
     print "あなたの身長は、 {$_POST['my_height']}cmですね";
     print '<br>';
     print "日付は{$_POST['yr']}年{$_POST['mo']}月{$_POST['dy']}日ですね";
     print '<br>';
     print "メールアドレスは、{$_POST['my_mail']}ですね";
}

// Display the form
function show_form($errors = '') {
    // If some errors were passed in, print them out
    if ($errors) {
        print 'Please correct these errors: <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
    }

    print<<<_HTML_
<form method="POST" action="$_SERVER[PHP_SELF]">
<fable>
<tr><td>Your name: </td><td><input type="text" name ="my_name"></td></tr>
<br>
<tr><td>年齢: </td><td><input type="text" name="my_age" size="2"></td></tr>
<br>
<tr><td>身長: </td><td><input type="text" name="my_height" size="5"></td></tr>
<br>
<tr><td>日付: </td><td><input type="text" name="yr" size="4">年<input type ="text" name ="mo" size="2">月<input type="text" name="dy" size="2">日</td></tr>
<br>
<tr><td>メール: </td><td><input type="text" name ="my_mail"></td></tr>
<br>
<tr><td>Your Order:</td></tr><select name="order">
</table>
</form>
_HTML_;

foreach ($GLOBALS['sweets'] as $choice) {
    print "<option>$choice</option>\n";
}


print<<<_HTML_
</select></td></tr>
  <tr><td><input type="submit" value="Order"></td></tr>
  <tr><td><input type="hidden" name="_submit_check" value="1"></td></tr>
</table>
</form> 
_HTML_;
}

// Check the form data
function validate_form() {
    // Start with an empty array of error messages
    $errors = array();

    //$name_len = mb_strlen(trim($_POST['my_name']));
    
    $_POST['my_name'] = trim($_POST['my_name']);
    // add an error message if the name is too short
    // 名前がからの場合はエラーとする
    //if($name_len  == 0){
       if(mb_strlen($_POST['my_name'])  == 0){
      $errors[] = '名前は必ず入力してください';
    }
    // Add an error message if the name is too short
    // 名前が３文字よりも少ない場合はエラーとする
    //elseif ($name_len < 3){
    elseif (mb_strlen($_POST['my_name']) < 3) {
        $errors[] = 'Your name must be at least 3 letters long.';
    }

    //年齢は整数で入力する
    if($_POST['my_age'] != strval(intval($_POST['my_age']))){
      $errors[] = '年齢を正しく入力して下さい';
    }elseif($_POST['my_age'] < 18 || $_POST['my_age'] > 65){
      $errors[] = '年齢は１８歳以上かつ６５歳以下の範囲のみ有効です';
    }

    // 身長は不動少数点数で入力する
    if($_POST['my_height'] != strval(floatval($_POST['my_height']))){
    $errors[] = '身長を正しく入力して下さい';
    }
    
    //日付の範囲のチェック
    //６ヶ月前のエポックタイムスタンプを取得
    $range_start = strtotime('6 months age');
    //原罪のエポックタイムスタンプを取得
    $range_end = time();
    
    //入力された日付のエポックタイムスタンプを求める
    $submitted_date = strtotime($_POST['yr'] . '_' .
                                $_POST['mo'] . '_' .
                                $_POST['dy']);

    //６ヶ月より前または原罪より後の日付はエラー
    if(($range_start > $submitted_date) || ($range_end < $submitted_date)){
      $errors[] = '６ヶ月目回向かつ原罪日時の範囲で日付を指定して下さい';
      }
    
    //メールアドレスのチェック
    if(!preg_match('/^[^@\s]+@[-a-z0-9]+\.+[a-z]{2,}$/i', $_POST['my_mail'])){
     $errors[] = '正しいメールアドレスを入力して下さい';
    }
    // Return the (possibly empty) array of error messages
    return $errors;
}
?>
