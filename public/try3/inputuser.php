<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body class="cyberpunk-bg">
    <div class="login-box">
      <h2>
        <?php
          // 1. 入力値の存在確認
          if (!isset($_GET['username']) || !isset($_GET['useraddress']) || !isset($_GET['usermail'])) {
              die("すべての項目を入力してください。");
          }

          // 2. 入力値が配列ではないか確認
          if (is_array($_GET['username']) || is_array($_GET['useraddress']) || is_array($_GET['usermail'])) {
              die("不正な入力です。");
          }

          // 3. 正規表現を使って文字をチェック
          $username = trim($_GET['username']);
          $useraddress = trim($_GET['useraddress']);
          $usermail = trim($_GET['usermail']);

          // 名前: 20文字以内、日本語のみ（漢字・ひらがな・カタカナ・空白）
          if (mb_strlen($username, 'UTF-8') > 20 || !preg_match('/^[\p{Hiragana}\p{Katakana}\p{Han}\s]+$/u', $username)) {
              die("名前は20文字以内の日本語のみ入力してください。");
          }

          // 住所: 50文字以内、日本語のみ
          if (mb_strlen($useraddress, 'UTF-8') > 50 || !preg_match('/^[\p{Hiragana}\p{Katakana}\p{Han}\s]+$/u', $useraddress)) {
              die("住所は50文字以内の日本語のみ入力してください。");
          }

          // メール: 100文字以内、使用可能文字（半角英数字 + .-_@）
          if (mb_strlen($usermail, 'UTF-8') > 100 || !preg_match('/^[a-zA-Z0-9\.\-\_@]+$/', $usermail)) {
              die("メールアドレスの形式が不正です。");
          }

          echo "あなたが入力した値<br>";
          echo "名前：" . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . "<br>";
          echo "住所：" . htmlspecialchars($useraddress, ENT_QUOTES, 'UTF-8') . "<br>";
          echo "メールアドレス：" . htmlspecialchars($usermail, ENT_QUOTES, 'UTF-8');
        ?>
    </h2>
    </div>
  </body>
</html>
