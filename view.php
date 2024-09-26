<?php
// 1. DB接続します
try {
    $pdo = new PDO('mysql:dbname=vegetable_classification;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DB_CONNECT_ERROR: ' . $e->getMessage());
}

// 2. データ取得SQL作成
$sql = "SELECT * FROM vegetables"; // 正しいSQL文
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// 3. データ表示
$view = "";
if ($status == false) {
    // SQL実行時にエラーがある場合
    $error = $stmt->errorInfo();
    exit("SQL_ERROR: " . $error[2]);
}

// 全データ取得
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOCでカラム名のみ取得
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>野菜分類表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px; font-size: 16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">データ登録</a>
            </div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>科</th>
                    <th>説明</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($values as $value) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($value['family'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($value['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
