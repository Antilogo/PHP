<?php 
$mysql = mysqli_connect("localhost", "root", "", "db_itplus_shopping");

//Viết câu sql
$sql = "DELETE FROM categories WHERE id = '".$_GET['id']."'";

$result = mysqli_query($mysql, $sql);

//Nếu câu SQL chạy ok thì redirect về trang chủ
if ($result) {
	header('location:index.php');	
}