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
    return $stmt->fetch(PDO::FETCH_ASSOC);
    
}

// 获取评论数据的函数
function get_comment(){
    $id = $_GET['id'];
    $dbs = 'mysql:dbname=photo;host=localhost';
    $user = 'root';
    $password = "";
    $pdo = new PDO($dbs, $user, $password);
    
    $query = "SELECT * FROM comments WHERE photo_id = ? ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 调用函数获取数据
$photo = get_data();
$comments = get_comment();
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

    <!-- 评论显示区域 -->
    <div class="photo-box">
        <h3>コメント</h3>
        <?php foreach($comments as $comment): ?>
            <div style="margin:10px 0; padding:10px; background:#f0f0f0;">
                <strong><?php echo ($comment['commenter_name']); ?></strong>
                <span style="color:#666; font-size:12px;"> - <?php echo $comment['comment_time']; ?></span><br>
                <p><?php echo ($comment['comment_text']); ?></p>
                <a href="coment_delete.php?id=<?php echo $comment['id']; ?>">コメント削除</a>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- 添加评论表单 -->
    <div class="photo-box">
        <h3>新しいコメントを投稿</h3>
        
        <?php
        if($_POST){
            $comment = $_POST['comment'];
            $name = $_POST['name'];
            $photo_id = $_GET['id'];

        $dbs = 'mysql:dbname=photo;host=localhost';
        $user = 'root';
        $password = "";
        $pdo = new PDO($dbs, $user, $password);

        $query = "INSERT INTO comments(comment_text,commenter_name,photo_id)VALUES(?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$comment,$name,$photo_id]);
        echo "コメントが追加されました";
        echo "<a href='view.php?id=" . $photo_id . "'>コメントを見る</a>";
    }
    else{
        ?>
        <form method="POST">
            <p>コメント<input type="text" name="comment"></p>
            <p>名前<input type="text" name="name"></p>
            <p><input type="submit" value="コメントする"</p>
        </form>
        <?php
    } ?>
    </div>
<br>
<a href="delete.php?id=<?php echo $photo['id']; ?>">写真削除</a>
</body>
</html>