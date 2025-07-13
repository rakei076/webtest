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
    max-width: 90%;  
}


@media screen and (max-width: 600px) {
    .photo-box {
        padding: 5px;      
        margin: 5px 0;    
    }
}
</style>
</head>
<body>
<h1> 最終課題 作者 羅敬越(A24I436)</h1>

<a href="index.php">ホームページ</a>
<?php 
//get id from url
$id = $_GET['id'];
//connect to database
$dbs = 'mysql:dbname=photo;host=localhost';
$user = 'root';
$password="";
$pdo = new PDO($dbs, $user, $password);
//get photo from database
$query = "SELECT * FROM photo WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$photo = $stmt->fetch(PDO::FETCH_ASSOC);
//delete photo ready
unlink($photo['photo']);
//delete photo from database
$query =" DELETE FROM photo WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
//go to index page
header("Location: index.php");
exit();

?>
<br>
<a href="index.php">ホームページ</a>
</body>
</html>