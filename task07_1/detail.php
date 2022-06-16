<?php

session_start();
$id = $_GET['id']; //?id~**を受け取る
require_once('funcs.php');
loginCheck();
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM factory_table WHERE id = :id');
$stmt->bindValue('id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
  sql_error($stmt);
}else{
  $result = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="update.php">
        <div class="form">
            <fieldset>
                <legend>登録フォーム</legend>
                <label>company_name<input type="text" name="company_name" value="<?= $result['company_name'] ?>"></label><br>
                <label>email<input type="text" name="email" value="<?= $result['email'] ?>"></label><br>
                <label>Web<input type="text" name="web" value="<?= $result['web'] ?>"></label><br>
                
                <input type="hidden" name="id" value="<?= $result['id'] ?>"><br>

                <input type="submit" value="send">
            </fieldset>
        </div>
    </form>

    <div>
        <a href="select.php">登録工場一覧</a>
    </div>
</body>
</html>