<html>
    <head>
        <meta charset="utf-8">
        <title>Create a new Account</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <header></header>
        <main>
          <?php
          session_start();
          if (!isset($_SESSION['user'])) {
            echo '<div class="new-account">
                <form action="account-output.php" method="post">
                    Username: <input type="text" name="username"><br>
                    Password: <input type="text" name="password"><br>
                    Avatar: <input type="file" name="avatar" enctype="multipart/form-data"><br>
                    <input type="submit" value="Create">
                </form>
            </div>';
          } else {
            echo 'You already have an account.';
          }
          ?>
        </main>
    </body>
</html>
