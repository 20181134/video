<html>
<head>
  <meta charset="utf-8">
  <title>
    <?php
    session_start();
    echo $_REQUEST['keyword'], ' - VideoSharing';
     ?>
   </title>
   <link rel="stylesheet" href="stylesheet.css">
 </head>
 <body>
   <header></header>
   <main>
     <?php
     $pdo=new PDO('mysql:host=localhost;dbname=video_sharing;charset=utf8;', 'admin', 'password');
     $stmt=$pdo->prepare('SELECT * FROM videos where title like %?%');
     if ($stmt->execute([$_REQUEST['keyword']])) {
       foreach ($stmt as $row) {
         echo '<div class="result">';
         echo '<a href="./'.$row['location'].'">';
         echo '<img src="'.$row['thumbnail'].'">';
         echo '<p>'.$row['title'].'</p>';
         echo '<p> Uploaded by '.$row['uploader'].'</p>';
         echo '</div>';
       }
     }
      ?>
   </main>
   <footer></footer>
 </body>
 </html>
