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
        // 入力値があるか確認
        if (!isset($_GET['indata'])) {
            die("入力してください。");
        }

        // 入力値が配列でないか確認
        $indata = filter_input(INPUT_GET, 'indata');

        // 数字のみを許可する
        if (!preg_match('/^[0-9]+$/', $indata)) {
            die("数値を入力してください。");
        }

        echo "入力された数字は：" . htmlspecialchars($indata, ENT_QUOTES, 'UTF-8');
        ?>

    </h2>
    </div>
  </body>
</html>
