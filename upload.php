<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>写真登録</title>
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

.success {
    color: green;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
}
</style>
</head>
<body>
<h1> 最終課題 作者 羅敬越(A24I436)</h1>

    <a href="index.php">首页</a>

    <?php
    if($_POST){
        // 调试代码 - 临时添加
        echo "POST数据：";
        var_dump($_POST);
        echo "FILES数据：";
        var_dump($_FILES);
        echo "文件错误代码：" . $_FILES['photo']['error'];
        
        // 你的原代码...
    }
if($_POST){
    $photo = $_FILES['photo']['name'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $upload_path = "uploads/" . $photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload_path);


    $dbs = 'mysql:dbname=photo;host=localhost';
    $user = 'root';
    $password="";
    $pdo = new PDO($dbs, $user, $password);



    $query = "INSERT INTO photo(filename,photo,title,location,description)VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$photo,$upload_path,$title,$location,$description]);
    
    echo "<p>アップロード成功</p>";
    echo "<a href='index.php'>写真一覧へ</a>";
}else{
?>
    <form method="POST" enctype="multipart/form-data">
        <p>写真を選んでください<input type="file" name="photo"></p>

        <p>タイトル<input type="text" name="title"></p>
        <p>地点<input type="text" name="location"></p>
        <p>説明<textarea name="description" ></textarea></p>
        <p><input type="submit" value="登録"></p>
    </form>
<?php } ?>

</body>
</html>