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
  <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  <h1>曲やミュージックビデオのリクエストフォーム</h1>
  
  </hedader>
    <main>
        
        <form method="POST" action="insert.php">
            
            <label class="name">名前（ニックネーム可能）:<input type="text" name="name"></label><br>
            <label class="music">リクエストしたい地域の曲  :</label>
            <select name="countryarea">
                <option value="">選択してください</option>
                <option value="北米">北米</option>
                <option value="南米">南米</option>
                <option value="北欧">北欧</option>
                <option value="西欧">西欧</option>
                <option value="東欧">東欧</option>
                <option value="南欧">南欧</option>
                <option value="北アフリカ">北アフリカ</option>
                <option value="西アフリカ">西アフリカ</option>
                <option value="東アフリカ">東アフリカ</option>
                <option value="アフリカの南">アフリカの南</option>
                <option value="北アジア">北アジア</option>
                <option value="西アジア">西アジア</option>
                <option value="中央アジア">中央アジア</option>
                <option value="東アジア">東アジア</option>
                <option value="東南アジア">東南アジア</option>
                <option value="南アジア">南アジア</option>
            </select><br>
            <label class="genre">ジャンル： </label>
            <select name="genre">
            <option value="">選択してください</option>
            <option value="">選択してください</option>
                <option value="RB&Seoul">RB&Seoul</option>
                <option value="Rock">Rock</option>
                <option value="POP">POP</option>
                <option value="クラシック">クラシック</option>
                <option value="ブルース">ブルース</option>
                <option value="カントリー">カントリー</option>
                <option value="フォーク">フォーク</option>
                <option value=">ヒップホップ">ヒップホップ</option>
                <option value="Jazz">Jazz</option>
                <option value="メタル">メタル</option>
                <option value="パンク">パンク</option>
                <option value="アニソン">アニソン</option> 
        </select><br>
        <label class="artist">曲名、アーティスト名等分かれば記入お願いします！
        <label><textArea name="text" rows="4" cols="40"></textArea></label><br>
        </label><br>
     <button input type="submit">送信</button>
                
           

        </form>
      
    </main>
    <footer></footer>
</body>
</html>