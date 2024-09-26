<?php
// データベース接続情報
$host = 'localhost';
$db   = 'vegetable_classification';
$user = 'root'; // お使いの環境に合わせて変更してください
$pass = '';     // お使いの環境に合わせて変更してください
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// フォームから送信されたデータを取得
$name = $_POST['name'];
$family = $_POST['family'];
$description = $_POST['description'];

// データベースにデータを挿入
$sql = "INSERT INTO vegetables (name, family, description) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $family, $description]);

// 登録後にフォームにリダイレクト
header("Location: index.php");
exit();
?>
