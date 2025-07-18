<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>写真展示コミュニティ</title>
<style>/*スタール設定*/
    .photo-box {
        /*photo box styles*/
        border: 1px solid #ccc;    /*Gray border*/
        padding: 10px;             /*inside space*/
        margin: 10px 0;            /*Outside space*/
        background-color:rgb(255, 255, 255);  /*Background background*/
    }
    
    .photo-box:hover {
        /*mobile styles*/
        background-color:rgb(170, 166, 166);/*Gray border*/
    }
    
    img {
        /*image styles*/
        max-width: 200px;
        max-height: 150px;
    }
</style>
</head>
<body>
<h1>写真展示コミュニティ</h1>
<p>最終課題 作者 羅敬越(A24I436)</p>

<?php 
// 修复后的函数版本
function get_data(){
    //connect to database
    $dbs = 'mysql:dbname=photo;host=localhost';
    $user = 'root';
    $password="";
    $pdo = new PDO($dbs, $user, $password);
    //get data from database
    $query = "SELECT * FROM photo";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    //返回数据
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function display_data($photos){
    foreach($photos as $row){
        ?>
        <div class="photo-box">
            <!--display title-->
            <h3><?php echo $row['title']; ?></h3>
            <!--display location-->
            <p>場所: <?php echo $row['location']; ?></p>
            <!--display image-->
            <img src="<?php echo $row['photo']; ?>">
            <!--go to view page-->
            <p><a href="view.php?id=<?php echo $row['id']; ?>">詳細を見る</a></p>
        </div>
        <?php
    }
}

// 调用函数
$photos = get_data();
display_data($photos);
?>
<br>
<!--go to upload page-->
<a href="upload.php">写真登録</a>
</body>
</html>