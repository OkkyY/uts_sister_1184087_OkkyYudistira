<?php
$pdo = new PDO('sqlite:uploads.sqlite');

$name = $_POST['name'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];

$sql = null;
if($aksi) {
	$sql = "INSERT INTO zippy(name)
		VALUES('$name')";
}

$result = $pdo -> exec($sql);
if($result) {
	echo '<script>alert("Success!")</script>';
	header('location:index.php');
} else {
	echo '<script>alert("failed!")</script>';
	header('location:index.php');
}
sqlite_close();?>
