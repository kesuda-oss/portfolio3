<?php
//データの受け取り
    $id = $_GET['id'];
    if($id == ''){
        echo "エラー";
        header('Location:dbtest-select.php');
        exit();
    }
    //DB接続
    $dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
    $user = 'tennisuser';
    $password = '10810to23';
        try{
        $db = new PDO($dsn,$user,$password);
        $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
       
        $stmt = $db->prepare("SELECT*FROM bbs WHERE id=:id
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
        <?php while($row = $stmt->fetch()): ?>
            <p>id:<?=$row['id']?></p>
            <p>名前:<?=$row['name'] ;?></p>
            <p>title:<?=$row['title'] ;?></p>
            <p>body:<?=$row['body'] ;?></p>
            <p>date:<?=$row['date'] ;?></p>
            <?php if($row['pass']!=""){
                    $pass = "****";
                }else{
                    $pass = "";
                }
            ?>
            <p>pass:<?=$pass;?></p>  
        <?php endwhile; ?>
        <a class="back" href="dbtest-select.php" >＜一覧に戻る</a>
    </div>
    
</body>
</html>

