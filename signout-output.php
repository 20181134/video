<html>
<head>
  <meta charset="utf-8">
  <title>Sign Out</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <?php
  unset($_SESSION['user']);
  if (!isset($_SESSION['user'])) {
    echo 'Logged out successfully.';
  } else {
    echo 'Could not log out';
  }
   ?>
   <br><a href="./home.php">Back to Home</a>
 </body>
 </html>
