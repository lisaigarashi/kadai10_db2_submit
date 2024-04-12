<?php
//2. DB接続します
include("funcs.php");
// 外部のファイルを読み込み関数を動かす
$pdo = db_conn();


//２．データ登録SQL作成
$sql = "SELECT * FROM request_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}


//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="css\select.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>曲のリクエスト表示</title>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">最初のページに戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
<h1>リクエスト一覧</h1>

<table class="data">
<?php foreach($values as $value){ ?>
  <tr>
  <td><?= h($value["id"])?></td>
        <td><?= h($value["name"]) ?></td>
        <td><?= h($value["countryarea"]) ?></td>
        <td><?= h($value["genre"] )?></td>
        <td><?= h($value["text"] )?></td>
        <td><?= h($value["indate"]) ?></td>
        <td><a href ="detail.php?id=<?= h($value["id"])?>" >更新</a></td>
        <td><a href ="delete.php?id=<?= h($value["id"])?>" >削除</a></td>
      <?php } ?>
      </tr>

</table>


  </div>
</div>
<!-- Main[End] -->
<script>
  $a='<?=$json?>';
    const obj= JSON.parse($a);
    console.log(obj);

</script>
</body>
</html>
