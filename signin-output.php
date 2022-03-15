<html>
<head>
  <meta charset="utf-8">
  <title>Sign In</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <header></header>
  <main>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8;', 'admin', 'password');
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
      echo 'Logged in as ', $_SESSION['user']['username'];
    } else {
      echo 'Username or password is incorrect';
    }
    echo '<br><a href="./home.php">Back to Home</a>';
    ?>
  </main>
  <footer></footer>
</body>
</html>
