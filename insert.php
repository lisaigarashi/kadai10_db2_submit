<?php
//1. POSTデータ取得
//[name,cuntryarea,genre,text]
$name = $_POST["name"];
$countryarea = $_POST["countryarea"];
$genre = $_POST["genre"];
$text = $_POST["text"];



$fields = [$name,$countryarea,$genre,$text];
$errors = [];
foreach ($fields as $field) {
  
    if (empty($field)) {
        $errors[] = '<div class="zen-maru">必須項目に入力してください<br></div>';
    }
}
// 配列の中身を確認するのは以下
// var_dump($errors);
// exit();

// エラーメッセージがあれば表示
if ($errors) {
    foreach ($errors as $error) {
        echo $error;
    }
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
} else {

    //2. DB接続します
    
    include("funcs.php");
    // 外部のファイルを読み込み関数を動かす
    $pdo = db_conn();


  //３．データ登録SQL作成
  $sql = "INSERT INTO request_table(name,countryarea,genre,text,indate)VALUES(:name,:countryarea,:genre,:text,sysdate())";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':countryarea', $countryarea, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();      //true or faluseが入る

  // //４．データ登録処理後
  if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
   sql_error($stmt);
  } else {
    //５．index.phpへリダイレクト
   redirect("select.php");
  }

}
?>
