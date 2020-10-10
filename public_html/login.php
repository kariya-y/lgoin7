<?php
require_once(__DIR__ . '/../config/config.php');

//$app = new login7\Controller\Login();

//$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <title>Log In</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <div id="container">
   <form action="" method="post">
     <p>
       <input type="text" name="email" placeholder="email">
     </p>
     <p>
       <input type="password" name="password" placeholder="password">
     </p>
     <div class="btn">Log In</div>
   </form>
 </div>
</body>
</html>