<?php
// funcs.phpの読み込み
require_once('funcs.php');

// データベース接続
$pdo = db_conn();

// フォームデータの取得
$name = $_POST['name'];
$family = $_POST['family'];
$description = $_POST['description'];
$image_path = $_POST['image_path'];

// データベースへのデータ挿入
$sql = "INSERT INTO vegetables (name, family, description, image_path) VALUES (:name, :family, :description, :image_path)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':family', $family, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':image_path', $image_path, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録の結果確認
if ($status) {
    echo "登録が完了しました。";
} else {
    sql_error($stmt);
}
?>
