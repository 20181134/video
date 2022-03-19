<html>
<head>
  <meta charset="utf-8">
  <title>Upload</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <h1>Upload</h1>
  <?php
  $pdo=new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8;', 'admin', 'password');
  if (is_uploaded_file($_FILES['upload']['tmp_name'])) {
    if (!file_exists('videos')) {
      mkdir('videos');
    }
    $videoname='videos/'.basename($_FILES['upload']['tmp_name']);
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $videoname)) {
      echo 'Your video has been uploaded.<br>';
    } else {
      echo 'Could not upload your video.<br>';
    }
  } else {
    echo 'The video was not an uploaded file<br>';
  }
   ?>
 </body>
 </html>
