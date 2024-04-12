<?php
$id=$_GET["id"];
// var_dump($id );
// exit;
include("funcs.php");
// 外部のファイルを読み込み関数を動かす
$pdo = db_conn();


//２．データ登録SQL作成
$sql = "SELECT * FROM request_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
// var_dump($status );
// exit;



//３．データ表示
$values = "";
if($status==false) {
    sql_error($stmt);
}

//1レコードだけ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]



// var_dump($v);
// exit;
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <title>リクエストしたい</title>
</head>
<body id="home">
  <hedader>
  <h1>曲やミュージックビデオのリクエストフォーム更新・修正</h1>
  </hedader>
    <main>
        
        <form method="POST" action="update.php">            
            <label class="name">名前（ニックネーム可能）:<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
            <label class="music">リクエストしたい地域の曲  :</label>
                <select name="countryarea">
                <option value="">選択してください</option>
                <option value="北米" <?= $v["countryarea"] == "北米" ? "selected" : "" ?>>北米</option>
                <option value="南米"<?= $v["countryarea"] == "南米" ? "selected" : "" ?>>南米</option>
                <option value="北欧"<?= $v["countryarea"] == "北欧" ? "selected" : "" ?>>北欧</option>
                <option value="西欧"<?= $v["countryarea"] == "西欧" ? "selected" : "" ?>>西欧</option>
                <option value="東欧"<?= $v["countryarea"] == "東欧" ? "selected" : "" ?>>東欧</option>
                <option value="南欧"<?= $v["countryarea"] == "南欧" ? "selected" : "" ?>>南欧</option>
                <option value="北アフリカ"<?= $v["countryarea"] == "北アフリカ" ? "selected" : "" ?>>北アフリカ</option>
                <option value="西アフリカ"<?= $v["countryarea"] == "西アフリカ" ? "selected" : "" ?>>西アフリカ</option>
                <option value="東アフリカ"<?= $v["countryarea"] == "東アフリカ" ? "selected" : "" ?>>東アフリカ</option>
                <option value="アフリカの南"<?= $v["countryarea"] == "アフリカの南" ? "selected" : "" ?>>アフリカの南</option>
                <option value="北アジア"<?= $v["countryarea"] == "北アジア" ? "selected" : "" ?>>北アジア</option>
                <option value="西アジア"<?= $v["countryarea"] == "西アジア" ? "selected" : "" ?>>西アジア</option>
                <option value="中央アジア"<?= $v["countryarea"] == "中央アジア" ? "selected" : "" ?>>中央アジア</option>
                <option value="東アジア"<?= $v["countryarea"] == "東アジア" ? "selected" : "" ?>>東アジア</option>
                <option value="東南アジア"<?= $v["countryarea"] == "東南アジア" ? "selected" : "" ?>>東南アジア</option>
                <option value="南アジア"<?= $v["countryarea"] == "南アジア" ? "selected" : "" ?>>南アジア</option>
            </select><br>
   
        <label class="genre">ジャンル： </label>
            <select name="genre">
            <option value="">選択してください</option>
                <option value="">選択してください</option>
                <option value="RB&Seoul" <?= $v["genre"] == "RB&Seoul" ? "selected" : "" ?>>RB&Seoul</option>
                <option value="Rock" <?= $v["genre"] == "Rock" ? "selected" : "" ?>>Rock</option>
                <option value="POP" <?= $v["genre"] == "POP" ? "selected" : "" ?>>POP</option>
                <option value="クラシック" <?= $v["genre"] == "クラシック" ? "selected" : "" ?>>クラシック</option>
                <option value="ブルース" <?= $v["genre"] == "ブルース" ? "selected" : "" ?>>ブルース</option>
                <option value="カントリー" <?= $v["genre"] == "カントリー" ? "selected" : "" ?>>カントリー</option>
                <option value="フォーク" <?= $v["genre"] == "フォーク" ? "selected" : "" ?>>フォーク</option>
                <option value=">ヒップホップ" <?= $v["genre"] == "ヒップホップ" ? "selected" : "" ?>>ヒップホップ</option>
                <option value="Jazz" <?= $v["genre"] == "Jazz" ? "selected" : "" ?>>Jazz</option>
                <option value="メタル" <?= $v["genre"] == "メタル" ? "selected" : "" ?>>メタル</option>
                <option value="パンク" <?= $v["genre"] == "パンク" ? "selected" : "" ?>>パンク</option>
                <option value="アニソン" <?= $v["genre"] == "アニソン" ? "selected" : "" ?>>アニソン</option> 
        </select><br>
        <label class="artist">曲名、アーティスト名等分かれば記入お願いします！
            <label><textArea name="text" rows="4" cols="40"><?=$v["text"]?></textArea></label><br>
            <input type="hidden" name="id" value="<?=$v["id"]?>">
        </label><br>
     <button input type="submit">更新</button>
                
           

        </form>
      
    </main>
    <footer></footer>
</body>
</html>