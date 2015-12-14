<?php
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
<tr><td>年齢: </td><td><input type="text" name="my_age" size="2"></td></tr>
<tr><td>身長: </td><td><input type="text" name="my_height" size="5"></td></tr>
<tr><td><input type="submit" value="Say Hello"></td></tr>
<tr><td><input type="hidden" name="_submit_check" value="1"></td></tr>
</table>
</form>
_HTML_;
}

// Check the form data
function validate_form() {
    // Start with an empty array of error messages
    $errors = array();
    // 名前がからの場合はエラーとする
    if(mb_strlen($_POST['my_name']) == 0){
      $errors[] = '名前は必ず入力してください';
    }
    // Add an error message if the name is too short
    // 名前が３文字よりも少ない場合はエラーとする
    elseif (mb_strlen($_POST['my_name']) < 3) {
        $errors[] = 'Your name must be at least 3 letters long.';
    }

    //年齢は整数で入力する
    if($_POST['my_age'] != strval(intval($_POST['my_age']))){
      $errors[] = '年齢を正しく入力して下さい';
    }

    // 身長は不動少数点数で入力する
    if($_POST['my_height'] != strval(floatval($_POST['my_height']))){
    $errors[] = '身長を正しく入力して下さい';
    }
    // Return the (possibly empty) array of error messages
    return $errors;
}
