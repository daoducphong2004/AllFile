<?php
session_start();
if(isset($_SESSION['id'])){
    echo $_SESSION['id'];
    echo "<a href='./logout.php'>đăng xuất</a>";

}else{
    echo " chào khách mới <br>";
    echo "<a href='./sesion.php'>quay lại</a>";
}

?>