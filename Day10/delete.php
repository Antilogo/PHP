<?php 
$mysql = mysqli_connect("localhost", "root", "", "Day10");

//Viết câu sql
$sql = "DELETE FROM login WHERE id = ".$_GET['id'];

$result = mysqli_query($mysql, $sql);

//Nếu câu SQL chạy ok thì redirect về trang chủ
if ($result) {
	header('location:index.php');	
}