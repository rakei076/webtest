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
    //check if post is empty
    if($_POST){
        //debug code
        echo "POST data:";
        var_dump($_POST);
        echo "FILES data:";
        var_dump($_FILES);
        echo "file error code: " . $_FILES['photo']['error'];
        
        //your original code...
    }
//if post is not empty
if($_POST){
    //get photo name
    $photo = $_FILES['photo']['name'];
    //get title
    $title = $_POST['title'];
    //get location
    $location = $_POST['location'];
    //get description
    $description = $_POST['description'];
    //get upload path
    $upload_path = "uploads/" . $photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload_path);

    //connect to database
    $dbs = 'mysql:dbname=photo;host=localhost';
    $user = 'root';
    $password="";
    $pdo = new PDO($dbs, $user, $password);
    //insert data into database


    $query = "INSERT INTO photo(filename,photo,title,location,description)VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$photo,$upload_path,$title,$location,$description]);
    //send message for success
    echo "<p>アップロード成功</p>";
    echo "<a href='index.php'>写真一覧へ</a>";
}else{
?>  <!--if post is empty, show form-->
    <form method="POST" enctype="multipart/form-data">
        <p>写真を選んでください<input type="file" name="photo"></p>
        <!--title-->
        <p>タイトル<input type="text" name="title"></p>
        <!--location-->
        <p>地点<input type="text" name="location"></p>
        <!--description-->
        <p>説明<textarea name="description" ></textarea></p>
        <!--submit button-->
        <p><input type="submit" value="登録"></p>
    </form>
<?php } ?>

</body>
</html>