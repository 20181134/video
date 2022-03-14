<html>
    <head>
        <meta charset="utf-8">
        <title>Video</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <header>
            <div class="logo"></div>
            <div class="links"><div>
        </header>
        <main>
            <div class="timeline">
                <h2>Most Viewed</h2>
                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=utf8;charset=utf8', 'admin', 'password');
                $stmt = $pdo->prepare('SELECT * FROM videos ')
                ?>
            </div>
            <div class="sidebar"></div>
        </main>
        <footer></footer>
    </body>
</html>