<?php 
function showalldh(){
    $sql="SELECT * FROM `donhang` WHERE 1 ORDER BY id DESC";
    return getdata($sql);
}
function showalldhbyid($id){
    $sql="SELECT * FROM `donhang` WHERE id_user=$id ORDER BY id DESC";
    return getdata($sql);
}
function addctdh($id_dh,$id_product,$id_variants,$soluong,$total){
    $sql= "INSERT INTO `chitietdonhang`(`id_donhang`, `id_product`, `id_variants`, `soluong`, `total`) VALUES ('$id_dh','$id_product',$id_variants,'$soluong','$total')";
    insert($sql);
}
function showdhctbyid($id){
    $sql= "SELECT donhang.id_user, donhang.id,donhang.danhgia, chitietdonhang.id_product FROM donhang, chitietdonhang WHERE donhang.id = chitietdonhang.id_donhang AND chitietdonhang.id_product=$id";
    return getdata($sql);
}

function showchitietdh($id){
    $sql= " SELECT * FROM `chitietdonhang` WHERE id_donhang=$id";
    return getdata($sql);
}
function showonedh($id){
    $sql="SELECT * FROM `donhang` WHERE id=".$id;
    return getdata($sql);
}
function adddh($id_user,$ngaydathang,$ngaygiaohang,$hoten,$address,$phone,$email,$pay,$tong){
    $sql= "INSERT INTO `donhang`( `id_user`, `ngaydathang`, `ngaygiaohang`, `address`, `phone`, `hoten`, `pay`, `tong`, `trangthai`) 
    VALUES ('$id_user','$ngaydathang','$ngaygiaohang','$address','$phone','$hoten','$pay','$tong','Đang chờ xác nhận')";
    insert($sql);
}
function xoadh($id){
    $sql = "DELETE FROM `donhang` WHERE id=".$id;
     delete($sql);
  }
function suadh($hoten,$phone,$address,$ngaydathang,$ngaygiaohang,$pay,$trangthai,$id){
    $sql="UPDATE donhang SET hoten = '$hoten', phone = '$phone', address = '$address', ngaydathang = '$ngaydathang', ngaygiaohang = '$ngaygiaohang', pay = '$pay', trangthai = '$trangthai' WHERE id = $id";
    update($sql);
}
function updatettdanhgia($id){
    $sql= "UPDATE donhang SET danhgia='yet' Where id=$id";
    update($sql);
}
function trangthaidh($id,$trangthai){
    
}
function huydonhang($id_dh){
    $sql="UPDATE donhang SET trangthai='Đã hủy' WHERE id=$id_dh";
    update($sql);
}
?>