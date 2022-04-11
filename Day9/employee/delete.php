<?php 
require('../connection.php'); 

//Viết câu sql
$sql = "DELETE FROM employee WHERE id = ".$_GET['id'];

$result = mysqli_query($conn, $sql);

//Nếu câu SQL chạy ok thì redirect về trang chủ
if ($result) {
	header('location:index.php');	
}