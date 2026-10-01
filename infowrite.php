<?php
    $num = 10;
    //DBに接続
    $dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
    $user = 'tennisuser';
    $password = '10810to23';

    $page = 1;
    //getメソッドで２ページ以降が指定されてるとき
    if(isset($_GET['page'])&&$_GET['page']>1){
        $page = intval($_GET['page']);
    }
    try{
        //PDOインスタンスの生成
        $db = new PDO($dsn,$user,$password);
        $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //プリペアドステートメントを作成
        $stmt = $db->prepare("SELECT * FROM news ORDER BY newsdate DESC LIMIT :page, :num");
        //パラメータ割り当て
        $page = ($page-1)*$num;
        $stmt->bindParam(':page',$page,PDO::PARAM_INT);
        $stmt->bindParam(':num',$num,PDO::PARAM_INT);
        //クエリの実行
        $stmt->execute();
    }catch(PDOException $e){
        exit("エラー:".$e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サークルサイト</title>
    <link rel = "stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <?php include('navbar.php'); ?>

    <main role = "main" class = "container" style = "padding:60px 15px 0">

        <div>
           <h1>お知らせ</h1>
           <form action="info.php" method="post">
            <div class="form-group">
                <label >タイトル</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label >ニュース</label>
                <input type="text" name="newsdate" class="form-control">
            </div>
            <div class="form-group">
                <label >場所</label>
                <input type="text" name="place" class="form-control">
            </div>
            <div class="form-group">
                <label >議題</label>
                <input type="text" name="gidai" class="form-control">
            </div>
            <div class="form-group">
                <label >備考</label>
                <input type="text" name="bikou" class="form-control">
            </div>
        
            <input type="submit" class="btn btn-primary" value="書き込む">
           </form>
           <hr>
           <?php while($row = $stmt->fetch()): ?>
                <div class = "card mb-3">
                    <div class = "card-body">
                        <p class="card-text">
                            <a href="info_datail.php?id=<?=$row['id'];?>">
                            <?php echo $row['title']; ?>
                            </a>
                        </p>
                    </div>
                 
                </div>
    <?php endwhile; ?>
           
    <?php
        try{
            $stmt = $db->prepare("SELECT COUNT(*) FROM news");
            $stmt->execute();

        }catch (PDOException $e){
            exit("エラー：".$e->getMessage());
        }  
        $comments = $stmt->fetchColumn();
        $max_page = ceil($comments / $num);
        if($max_page >= 1){
            echo '<nav><ul class="pagination">';
            for($i = 1; $i <= $max_page; $i++){
                echo '<li class = "page-item"><a class="page-link" href="infowrite.php?page='.$i.'">'.$i.'</a></li>';
            }
            echo '</ul></nav>';
        }   
        
    ?> 
        
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script> window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>  