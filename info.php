<?php
$title = $_POST['title'];
$newsdate = $_POST['newsdate'];
$place = $_POST['place'];
$gidai = $_POST['gidai'];
$bikou = $_POST['bikou'];




$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'tennisuser';
$password = '10810to23';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("
        INSERT INTO news(title, newsdate, place, gidai, bikou)
        VALUES(:title, :newsdate, :place, :gidai, :bikou)
    ");

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':newsdate', $newsdate, PDO::PARAM_STR);
    $stmt->bindParam(':place', $place, PDO::PARAM_STR);
    $stmt->bindParam(':gidai', $gidai, PDO::PARAM_STR);
    $stmt->bindParam(':bikou', $bikou, PDO::PARAM_STR);


    $stmt->execute();

    header("Location:infowrite.php");
    exit();

} catch (PDOException $e) {
    exit('エラー: ' . $e->getMessage());
}
?>
