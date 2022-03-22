<html>
<head>
  <meta charset="utf-8">
  <title>Create a new Account</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <header></header>
  <main>
    <h1>New Account Creation</h1>
  <?php
  session_start();
  // Upload avatar
  if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    if (!file_exists('avatar')) {
      mkdir('avatar');
    }
    $file='avatar/'.basename($_FILES['avatar']['tmp_name']).'.jpg';
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $file)) {
      echo 'Uploaded your avatar<br>';
      // Connect to SQL database
      $pdo = new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8', 'admin', 'password');
      $stmt = $pdo->prepare('INSERT INTO userdata values(?, ?, ?)');
      // Put information to SQL database
      if ($stmt->execute([$_REQUEST['username'], $_REQUEST['password'], $file])) {
        echo 'Created your account successfully.<br>';
        // Account page Creation
        $userpage = fopen('./user/'.$_REQUEST['username'].'.php', "w");
        $str = file_get_contents('account-template.txt');
        $str = str_replace('Username', $_REQUEST['username'], $str);
        $str = str_replace('Icon', basename($_FILES['avatar']['tmp_name']), $str);
        // 置き換える文字列を追加
        fwrite($userpage, $str);
        if (file_exists('./user/'.$_REQUEST['username'].'.php')) {
          echo 'Your channel has been created!<br>';
        } else {
          echo 'Could not create your channel.<br>';
        }

        // Set $_SESSION['user']
        //$stmt2 = $pdo->prepare('SELECT * FROM video_sharing where username=? and password=?');
        //if ($stmt2->execute([$_REQUEST['username'], $_REQUEST['password']])) {
          //foreach ($stmt2 as $row) {
            //$_SESSION['user'] = [
              //'username'=>$row['username'],
              //'avatar'=>$row['avatar']
            //];
          //}
        //}
        //if (isset($_SESSION['user'])) {
          //echo 'Logged in successfully.<br>';
        //} else {
          //echo 'Could not log in.<br>';
        //}
      } else {
        echo 'Could not create your account.';
      }
      echo '<br><a href="./home.php">Back</a>';
    } else {
      echo 'Could not upload your avatar';
    }
  } else {
    echo 'Your avatar is not an uploaded file';
  }
   ?>
 </main>
 </body>
 </html>
