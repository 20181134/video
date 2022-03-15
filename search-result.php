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
     foreach ($pdo->query('SELECT * FROM videos where title like %'.$_REQUEST['keyword'].'%') as $row)  {
       echo $row['videos'], '<br>';
     }
      ?>
   </main>
   <footer></footer>
 </body>
 </html>
