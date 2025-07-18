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

<a href="index.php">ホームページ</a>
<?php 
function get_data(){
    //get id from url
    $id = $_GET['id'];
    //connect to database
    $dbs = 'mysql:dbname=photo;host=localhost';
    $user = 'root';
    $password="";
    $pdo = new PDO($dbs, $user, $password);
    //get id photo from database
    $query = "SELECT * FROM photo WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $photo = $stmt->fetch(PDO::FETCH_ASSOC);
    //返回数据
    return $photo;
}

// 调用函数获取数据
$photo = get_data();
?>
    <div class="photo-box">
        <!--display title-->
        <h3><?php echo $photo['title']; ?></h3>
        <!--display location-->
        <p>地点: <?php echo $photo['location']; ?></p>
        <!--display image-->
        <img src="<?php echo $photo['photo']; ?>">
        <!--display description-->
        <p>説明: <?php echo $photo['description']; ?></p>
    </div>
    <?php

get_data();

?>
<br>
<a href="delete.php?id=<?php echo $photo['id']; ?>">写真削除</a>
</body>
</html>