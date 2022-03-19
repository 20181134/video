<html>
<head>
  <meta charset="utf-8">
  <title>Upload</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <h1>Upload</h1>
  <?php
  session_start();
  if (is_uploaded_file($_FILES['video']['tmp_name'])) {
    if (!file_exists('videos')) {
      mkdir('videos');
    }
    $videoname='videos/'.basename($_FILES['video']['tmp_name']).'.mov';
    if (move_uploaded_file($_FILES['video']['tmp_name'], $videoname)) {
      echo 'Your video has been uploaded.<br>';
      // SQL
      date_default_timezone_set('Japan');
      $date=date('Y/m/d');
      $pdo=new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8;', 'admin', 'password');
      $stmt=$pdo->prepare('INSERT INTO videos values(?, ?, ?, ?, ?, ?, ?)');
      if ($stmt->execute([null, $_REQUEST['title'], $_REQUEST['description'], $_SESSION['user']['username'], null, $date, $videoname])) {
        echo "Uploaded your video's information to SQL database<br>";
      } else {
        echo "Could not upload your video's information to SQL database<br>";
      }
    } else {
      echo 'Could not upload your video.<br>';
    }
  } else {
    echo 'The video was not an uploaded file<br>';
  }
   ?>
   <a href="./home.php">Back to Home</a>
 </body>
 </html>
