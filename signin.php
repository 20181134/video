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
    if (!isset($_SESSION['user'])) {
      echo '
    <form action="signin-output.php" method="post">
      Username: <input type="text" name="username"><br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Sign In">
      </form>';
    } else {
      echo "You've already signed in";
    }
  ?>
  </main>
  <footer></footer>
</body>
</html>
