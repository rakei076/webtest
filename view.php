<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>サンプル</title>
<style>
.photo-box {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px 0;
    background-color: #f9f9f9;
    max-width: 90%;  /* 最大宽度为屏幕的90% */
}

/* 小屏幕时 */
@media screen and (max-width: 600px) {
    .photo-box {
        padding: 5px;      /* 更小的内边距 */
        margin: 5px 0;     /* 更小的外边距 */
    }
}
</style>
</head>
<body>
<h1> 最終課題 作者 羅敬越(A24I436)</h1>

<?php 
<a href="index.php">返回首页</a>
$id = $_GET['id'];

$dbs = 'mysql:dbname=photo;host=localhost';
$user = 'root';
$password="";
$pdo = new PDO($dbs, $user, $password);

$query = "SELECT * FROM photo WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$photo = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="photo-box">
        <h3><?php echo $photo['title']; ?></h3>
        <p>地点: <?php echo $photo['location']; ?></p>
        <img src="<?php echo $photo['photo']; ?>">
        <p>説明: <?php echo $photo['description']; ?></p>
    </div>
    <?php

?>
<br>
<a href="delete.php?id=<?php echo $photo['id']; ?>">写真削除</a>
</body>
</html>