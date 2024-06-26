<?php
// cách chức năng và kết nối với cơ sở dũ liệu bằng PDO 
include 'function.php';
$pdo = pdo_connect_mysql();
//trang mặc định được đặt là trang chủ home.php , khi vào trang đầu tiên sẽ là home
$page= isset($_GET['page'])&&file_exists($_GET['page'].'.php')?$_GET['page']:'home';
//include và hiển thị trang yêu cầu
include $page.'.php';
?>