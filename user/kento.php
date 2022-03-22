<html>
<head>
  <meta charset="utf-8">
  <title>kento</title>
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
      <a href=./upload.php>Upload</a>
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
  <div class="information">
    <img src="./avatar/php2GJ8C3.jpg">
    <p>kento</p>
  </div>
  <div class="uploads">
    <h2>Uploads</h2>
    <?php
    $pdo=new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8;', 'admin', 'password');
    $stmt=$pdo->prepare('SELECT * FROM videos where uploader=kento');
    if ($stmt->execute()) {
      foreach ($stmt as $row) {
        echo '<div class="uploaded">';
        echo '<img src="', $row['thumbnail'], '">';
        echo '<p>', $row['title'], '</p>';
        echo '</div>';
      }
    }
    ?>
  </div>
  <div class="comments">
    <h2>Channel Comments</h2>
  </div>
  <div class="profile">
    <h2>Profile</h2>
  </div>
  </main>