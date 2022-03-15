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
  if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    if (!file_exists('avatar')) {
      mkdir('avatar');
    }
    $file='user/'.basename($_FILES['avatar']['tmp_name']);
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $file)) {
      echo 'Uploaded your avatar';
    } else {
      echo 'Could not upload your avatar';
    }
  }
  echo '<br>';

  // Put information to SQL database
  if ($stmt->execute([$_REQUEST['username'], $_REQUEST['password'], $file])) {
    echo 'Created your account successfully.';
  } else {
    echo 'Could not create your account.';
  }
  echo '<br><a href="./home.php">Back</a>';

  // Set $_SESSION['user']
  $stmt2 = $pdo->prepare('SELECT * FROM video-sharing where username=? and password=?');
  if ($stmt2->execute([$_REQUEST['username'], $_REQUEST['password']])) {
    foreach ($stmt2 as $row) {
      $_SESSION['user'] = [
        'username'=>$row['username'],
        'password'=>$row['password']
      ];
    } else {
      echo 'Could not log in';
    }
  }
   ?>
 </main>
 </body>
 </html>
