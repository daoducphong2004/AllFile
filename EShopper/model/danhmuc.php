<?php
function loadall_danhmuc() {
    $listdanhmuc=getdata("SELECT * FROM `danhmuc` ORDER BY `id` DESC");
    return $listdanhmuc;
}
?>