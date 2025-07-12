<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>サンプル</title>
</head>
<body>
<?php
print "<h1> 最終課題 作者 羅敬越(A24I436)</h1>\n";
?>

<?php 
$dbs = 'mysql:dbname=photo;host=localhost';
$user = 'root';
$password="";
$pdo = new PDO($dbs, $user, $password);

$query = "SELECT * FROM photo";
$stmt = $pdo->prepare($query);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	
    print "<img src='{$row['photo']}'><br>";
}
?>
<a href="upload.php">写真登録</a><br><br>
</body>
</html>