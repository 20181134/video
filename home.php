<html>
    <head>
        <meta charset="utf-8">
        <title>Video</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <header>
            <div class="logo"></div>
            <div class="searchbar">
              <form action="search-result.php">
                <input type="text" name="keyword">
                <input type="submit" value="Search">
              </form>
            </div>
            <div class="links">
              <?php
              session_start();
              if (isset($_SESSION['user'])) {
                echo '<a href="./signout.php">', $_SESSION['user']['username'], '<a>';
              } else {
                echo '<a href="./signin.php">Log In</a>';
                echo '<a href="./createaccount.php">Create a new account</a>';
              }
              ?>
            <div>
        </header>
        <main>
            <div class="timeline">
                <h2>Most Viewed</h2>
                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8', 'admin', 'password');
                $stmt = $pdo->prepare('SELECT * FROM videos ')
                ?>
            </div>
            <div class="sidebar">
              <div class="account-information">
                <?php
                if (isset($_SESSION['user'])) {
                  echo '<img src="', $_SESSION['user']['avatar'];
                  echo $_SESSION['user']['username'];
                }
                 ?>
            </div>
        </main>
        <footer></footer>
    </body>
</html>
