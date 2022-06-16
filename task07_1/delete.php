<?php

session_start();

$id = $_GET['id'];

require_once('funcs.php');
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare('DELETE FROM factory_table WHERE id = :id');
$stmt->bindValue('id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
  sql_error($stmt);
}else{
  redirect('select.php');
}

?>