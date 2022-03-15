<html>
<head>
  <meta cahrset="utf-8".
  <title>Sign In</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <header></header>
  <main>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=video-sharing;charset=utf8' 'admin', 'password');
    $stmt = $pdo->prepare('SELECT * FROM userdata where username=? and password=?');
    if ($stmt->execute([$_REQUEST['username'], $_REQUEST['password']])) {
      foreach ($stmt as $row) {
        $_SESSION['user']=[
          'username'=>$row['username'],
          'avatar'=>$row['avatar']
        ];
      }
    }
    if (isset($_SESSION['user'])) {
      echo 'Logged in successfully';
    } else {
      echo 'Username or password is incoreect';
    }
    echo '<br><a href="./home.php">Back to Home';
    ?>
  </main>
  <footer></footer>
</body>
</html>
