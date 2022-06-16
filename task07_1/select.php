<?php




session_start();
// 1. ログインチェック処理！
require_once('funcs.php');
loginCheck();

// try {
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError'.$e->getMessage());
// }

//２．データ取得SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM factory_table');
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id=' . $result['id'] . '">';
    $view .= h($result['company_name']) .  ":" . h($result['email'])  . ":" . h($result['web']);
    $view .= '</a>';

    $view .= '<a href="delete.php?id=' . $result['id'] . '">';
    $view .= '【削除】';
    $view .= '</a>';

    $view .= '</P>';
  }

}
?>









<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>