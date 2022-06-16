<?php

//POSTデータ取得
$company_name = $_POST['company_name'];
$email = $_POST['email'];
$web = $_POST['web'];
$id = $_POST['id'];

//DB connect
require_once('funcs.php');
$pdo = db_conn();

//SQL
//SQL文を用意
$stmt = $pdo->prepare('UPDATE
                         factory_table 
                        SET 
                         company_name = :company_name, 
                         email = :email, 
                         web = :web 
                        WHERE 
                         id = :id;');

//バインド変数
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':web', $web, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//実行
$status = $stmt->execute();

//データ登録処理後
if($status === false){
  sql_error( $stmt);
  }else{
    redirect('index.php');
  }

?>

