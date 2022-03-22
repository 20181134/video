<html>
    <head>
        <meta charset="utf-8">
        <title>Video</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <header>
            <div class="logo"></div>
            <div class="head">
              <form action="search-result.php">
                <input type="text" name="keyword">
                <input type="submit" value="Search">
              </form>
              <div class="links">
                <a href=./upload.php>Upload</a>
                <?php
                session_start();
                if (isset($_SESSION['user'])) {
                  echo '<a class="link" href="./user/'.$_SESSION['user']['username'].'.php">My Channel</a>';
                  echo '<a class="link" href="./signout.php">', $_SESSION['user']['username'], '<a>';
                } else {
                  echo '<a class="link" href="./signin.php">Log In</a>';
                  echo '<a class="link" href="./createaccount.php">Create a new account</a>';
                }
                ?>
              <div>
            </div>
        </header>
        <main>
            <div class="timeline">
                <h2>Recently Uploaded</h2>
                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8', 'admin', 'password');
                $stmt = $pdo->prepare('SELECT * FROM videos');
                if ($stmt->execute()) {
                  foreach ($stmt as $row) {
                    echo '<div class="tl">';
                    echo '<a href="./'.$row['location'].'">';
                    echo '<img class="thumbnail" src="./'.$row['thumbnail'].'">';
                    echo '<p>'.$row['title'].'</p>';
                    echo '<p>'.$row['uploader'].'</p>';
                    echo '</a>';
                    echo '</div>';
                  }
                }
                ?>
            </div>
            <div class="sidebar">
              <div class="account-information">
                <?php
                if (isset($_SESSION['user'])) {
                  echo '<img class="avatar" src="', $_SESSION['user']['avatar'], '">';
                  echo $_SESSION['user']['username'];
                }
                 ?>
            </div>
        </main>
        <footer></footer>
    </body>
</html>
