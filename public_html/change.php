<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Change();

$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <title>Log In</title>
 <link rel="stylesheet" href="styles.css">
</head>
<body>
 <div id="container">
 	<h1>個人情報変更</h1>
 	<form action="change.php" method="post">
 	  <p class="err"><?= h($app->getErrors('change')); ?></p>
      <ul>
        <li>email：<?= h($app->me()->email)?></li>
        <input type="text" name="email" value="<?= h($app->me()->email)?>">
        <li>名前：<?= h($app->me()->name)?></li>
        <input type="text" name="name" value="<?= h($app->me()->name)?>">
      </ul>
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    <input type="submit" value="変更する">
    </form>
    <br>
	<form action="index.php" method="POST">
	  <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
	  <input type="submit" value="戻る">
	</form>
 </div>
</body>
</html>
