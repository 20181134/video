<html>
<head>
  <meta charset="utf-8">
  <title>Create a new Account</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <header></header>
  <main>
    <h1>Create a new Account</h1>
  <?php
  session_start();
  // Upload avatar
  if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    if (!file_exists('avatar')) {
      mkdir('avatar');
    }
    $file='avatar/'.basename($_FILES['avatar']['tmp_name']);
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $file)) {
      echo 'Uploaded your avatar';
      // Connect to SQL database
      $pdo = new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8', 'admin', 'password');
      $stmt = $pdo->prepare('INSERT INTO userdata values(?, ?, ?)');
      // Put information to SQL database
      if ($stmt->execute([$_REQUEST['username'], $_REQUEST['password'], $file])) {
        echo 'Created your account successfully.';
        // Set $_SESSION['user']
        $stmt2 = $pdo->prepare('SELECT * FROM video_sharing where username=? and password=?');
        if ($stmt2->execute([$_REQUEST['username'], $_REQUEST['password']])) {
          foreach ($stmt2 as $row) {
            $_SESSION['user'] = [
              'username'=>$row['username'],
              'avatar'=>$row['avatar']
            ];
          }
        }
      } else {
        echo 'Could not create your account.';
      }
      echo '<br><a href="./home.php">Back</a>';
    } else {
      echo 'Could not upload your avatar';
    }
  } else {
    echo 'Your avatar was not an uploaded file';
  }
   ?>
 </main>
 </body>
 </html>
