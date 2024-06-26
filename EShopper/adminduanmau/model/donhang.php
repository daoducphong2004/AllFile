<?php 
function showalldh(){
    $sql="SELECT * FROM `donhang` WHERE 1 ORDER BY id DESC";
    return pdo_query($sql);
}
function showonedh($id){
    $sql="SELECT * FROM `donhang` WHERE id=".$id;
    return pdo_query($sql);
}
function adddh($id_user,$ngaydathang,$ngaygiaohang,$hoten,$address,$phone,$email,$pay,$tong){
    $sql= "INSERT INTO `donhang`( `id_user`, `ngaydathang`, `ngaygiaohang`, `address`, `phone`, `hoten`, `pay`, `tong`, `trangthai`) 
    VALUES ('$id_user','$ngaydathang','$ngaygiaohang','$address','$phone','$hoten','$pay','$tong','Đang chờ xác nhận')";
    pdo_execute($sql);
}
function xoadh($id){
    $sql = "DELETE FROM `donhang` WHERE id=".$id;
     pdo_execute($sql);
  }
function suadh($trangthai,$ngaygiaohang,$id){
    $sql="UPDATE donhang SET trangthai = '$trangthai', ngaygiaohang = '$ngaygiaohang' WHERE id = $id";
    pdo_execute($sql);
}
function showchitietdh($id){
    $sql= " SELECT * FROM `chitietdonhang` WHERE id_donhang=$id";
    return pdo_query($sql);
}
function huydonhang($id_dh){
    $sql="UPDATE donhang SET trangthai='Đã hủy' WHERE id=$id_dh";
    pdo_query($sql);
}
function trangthaidh($id,$trangthai){
    
}
?>