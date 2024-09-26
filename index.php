<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>野菜分類表示</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <style>
        body {
            background-image: url('img/haikei.png'); /* 背景画像を設定 */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }
        .sidebar {
            width: 200px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin: 20px;
        }
        .btn {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .vegetable {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.9);
            text-align: center;
            max-width: 80%;
        }
        .vegetable img {
            max-width: 300px;
            border-radius: 10px;
        }
        #registrationForm {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        .form-input {
            margin-bottom: 10px;
            padding: 5px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- 左側のボタン一覧 -->
        <div class="sidebar">
            <a href="#" class="btn" onclick="showVegetable('Brassicaceae')">アブラナ科</a>
            <a href="#" class="btn" onclick="showVegetable('Solanaceae')">ナス科</a>
            <a href="#" class="btn" onclick="showVegetable('Cucurbitaceae')">ウリ科</a>
            <a href="#" class="btn" onclick="showVegetable('Apiaceae')">セリ科</a>
            <a href="#" class="btn" onclick="showVegetable('Fabaceae')">マメ科</a>
            <!-- 登録ボタン -->
            <a href="#" class="btn" onclick="showRegistrationForm()">登録</a>
        </div>
    </div>

    <!-- 野菜情報を表示するコンテンツ -->
    <div id="Brassicaceae" class="vegetable">
        <h2>アブラナ科 - キャベツ</h2> 
        <img src="img/cabbage.png" alt="キャベツ">
    </div>
    <div id="Solanaceae" class="vegetable">
        <h2>ナス科 - トマト</h2>
        <img src="img/tomato.png" alt="トマト">
    </div>
    <div id="Cucurbitaceae" class="vegetable">
        <h2>ウリ科 - キュウリ</h2>
        <img src="img/cucumber.png" alt="キュウリ">
    </div>
    <div id="Apiaceae" class="vegetable">
        <h2>セリ科 - ニンジン</h2>
        <img src="img/carrot.png" alt="ニンジン">
    </div>
    <div id="Fabaceae" class="vegetable">
        <h2>マメ科 - グリーンピース</h2>
        <img src="img/green peas.png" alt="グリーンピース">
    </div>

    <!-- 登録画面 -->
    <div id="registrationForm">
        <h2>野菜の登録</h2>
        <form action="register_vegetable.php" method="POST">
            <input type="text" name="name" class="form-input" placeholder="野菜の名前" required>
            <select name="family" class="form-input" required>
                <option value="Brassicaceae">アブラナ科</option>
                <option value="Solanaceae">ナス科</option>
                <option value="Cucurbitaceae">ウリ科</option>
                <option value="Apiaceae">セリ科</option>
                <option value="Fabaceae">マメ科</option>
            </select>
            <input type="text" name="description" class="form-input" placeholder="説明（任意）">
            <input type="text" name="image_path" class="form-input" placeholder="画像パス" required>
            <button type="submit" class="btn">送信</button>
        </form>
        <button class="btn" onclick="closeRegistrationForm()">閉じる</button>
    </div>

    <script>
        function showVegetable(family) {
            const vegetables = document.querySelectorAll('.vegetable');
            vegetables.forEach(v => v.style.display = 'none');
            document.getElementById(family).style.display = 'block';
        }

        function showRegistrationForm() {
            document.getElementById('registrationForm').style.display = 'block';
        }

        function closeRegistrationForm() {
            document.getElementById('registrationForm').style.display = 'none';
        }
    </script>
</body>
</html>
