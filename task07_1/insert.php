<?php

//POSTデータ取得
$company_name = $_POST['company_name'];
$email = $_POST['email'];
$web = $_POST['web'];

//DB connect
require_once('funcs.php');
$pdo = db_conn();

//SQL
//SQL文を用意
$stmt = $pdo->prepare("INSERT INTO factory_table(id, company_name, email, web) VALUES (NULL, :company_name, :email, :web);");

//バインド変数
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':web', $web, PDO::PARAM_STR);

//実行
$status = $stmt->execute();

//データ登録処理後
if($status === false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    // $error = $stmt->errorInfo();
    // exit('ErrorMessage:'.$error[2]);
  sql_error( $stmt);

  }else{
    //５．index.phpへリダイレクト
    redirect('index.php');
  }

?>