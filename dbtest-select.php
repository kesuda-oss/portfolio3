<?php
//db接続
    $dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
    $user = 'tennisuser';
    $password = '10810to23';
//sql
    try{
        $db = new PDO($dsn,$user,$password);
        $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
       
        $stmt = $db->prepare("SELECT*FROM bbs");
        $stmt->execute();
    }catch(PDOException $e){
        exit("エラー:".$e->getMessage());
    }
    //結果
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一覧画面</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP&family=Noto+Sans:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<body>
    
    <div class ="main">
        <h1>掲示板の内容一覧</h1>
    <?php while($row = $stmt->fetch()): ?>
        <p><a href="infowrite.php?id=<?=$row['id'];?>">id:<?=$row['id']?></a>&nbsp;名前:<?=$row['title'] ;?></p>

    <?php endwhile; ?>
    </div>

    
</body>
</html>
