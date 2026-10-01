<?php
//データの受け取り
    $id = $_GET['id'];
    if($id == ''){
        echo "エラー";
        header('Location:infowrite.php');
        exit();
    }
    //DB接続
    $dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
    $user = 'tennisuser';
    $password = '10810to23';
        try{
        $db = new PDO($dsn,$user,$password);
        $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
       
        $stmt = $db->prepare("SELECT*FROM news WHERE id=:id
        ");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
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
    <title>詳細一覧</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP&family=Noto+Sans:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <div class="main">
        <h1>詳細情報</h1>
        <div class="contents"> 
        <?php while($row = $stmt->fetch()): ?>
           
        <div class = "box">
            <p>id:<?=$row['id']?></p>
            <p>タイトル:<?=$row['title'] ;?></p>
            <p>ニュース:<?=$row['newsdate'] ;?></p>
            <p>場所:<?=$row['place'] ;?></p>
            <p>議題:<?=$row['gidai'] ;?></p>
            <p>備考:<?=$row['bikou'] ;?></p>
        </div>
        <?php endwhile; ?>
        <a class="back" href="infowrite.php" >＜一覧に戻る</a>
        </div>
        
    </div>
    
</body>
</html>

