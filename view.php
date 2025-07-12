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
    }
    

</style>
</head>
<body>
<h1> 最終課題 作者 羅敬越(A24I436)</h1>

<?php 
$dbs = 'mysql:dbname=photo;host=localhost';
$user = 'root';
$password="";
$pdo = new PDO($dbs, $user, $password);

$query = "SELECT * FROM photo";
$stmt = $pdo->prepare($query);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="photo-box">
        <h3><?php echo $row['title']; ?></h3>
        <p>地点: <?php echo $row['location']; ?></p>
        <img src="<?php echo $row['photo']; ?>">
        <p><a href="view.php?id=<?php echo $row['id']; ?>">查看详情</a></p>
    </div>
    <?php
}
?>
<br>
<a href="upload.php">写真登録</a>
</body>
</html>