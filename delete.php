<?php

$id = $_GET['id'];

require_once('dbc.php');
$pdo = dbc();

//２．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM file_table WHERE id = :id');
// WHEREを忘れると全消しになるので注意。

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    // $result = $stmt->fetch();
    // リダイレクト処理にする。
    redirect('index.php');
}

?>