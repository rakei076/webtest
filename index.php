<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ホームページ</title>
<style>/*スタール設定*/
    .photo-box {
        /*photo box styles*/
        border: 1px solid #ccc;    /*Gray border*/
        padding: 10px;             /*inside space*/
        margin: 10px 0;            /*Outside space*/
        background-color:rgb(70, 66, 66);  /*Background background*/
    }
    
    .photo-box:hover {
        /*mobile styles*/
        background-color: #e9e9e9;/*Gray border*/
    }
    
    img {
        /*image styles*/
        max-width: 200px;
        max-height: 150px;
    }
</style>
</head>
<body>
<h1> 最終課題 作者 羅敬越(A24I436)</h1>

<?php 
//connect to database
$dbs = 'mysql:dbname=photo;host=localhost';
$user = 'root';
$password="";
$pdo = new PDO($dbs, $user, $password);
//get data from database
$query = "SELECT * FROM photo";
$stmt = $pdo->prepare($query);
$stmt->execute();
//display data
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
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
?>
<br>
<!--go to upload page-->
<a href="upload.php">写真登録</a>
</body>
</html>