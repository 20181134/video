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
  unset $_SESSION['user'];
  // Connect to SQL database
  $pdo = new PDO('mysql:host=localhost;dbname=video-sharing;charset=utf8', 'admin', 'password');
  $stmt = $pdo->prepare('INSERT INTO userdata values(?, ?, ?)');

  // Upload avatar
  if (is_uploaded_file($_REQUEST['avatar']['tmp_name'])) {
    if (!file_exists('avatar')) {
      mkdir('avatar');
    }
    $file='user/'.basename($_FILE['avatar']['tmp_name']);
  }

  // Put information to SQL database
  if ($stmt->execute([$_REQUEST['username'], $_REQUEST['password']])) {
    echo 'Created your account successfully.';
  } else {
    echo 'Could not create your account.';
  }
  echo '<br><a href="./home.php">Back</a>';
   ?>
 </main>
 </body>
 </html>
