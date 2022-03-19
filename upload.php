<html>
<head>
  <meta charset="utf-8">
  <title>Upload</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <?php
  session_start();
  if (isset($_SESSION['user'])) {
    echo '<form action="upload-output.php">';
    echo 'Title: <input type="text" name="title"><br>';
    echo 'Description: <textarea name="deescription"></textarea><br>';
    echo 'Select a video: <input type="file" name="upload">';
    echo '<input type="submit" value="Upload">';
    echo '</form>';
  } else {
    echo '<a href="./signin.php">Sign In</a> or <a href="./createaccount.php">Create a new account</a> to upload a video';
  }
   ?>
 </body>
 </html>
