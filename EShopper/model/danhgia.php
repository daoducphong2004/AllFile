<?php 
function showalldg(){
    $sql="SELECT `danhgia`.*, `taikhoan`.`hoten` AS `tennguoidanhgia`, `product`.`name` AS `tensanpham`
    FROM `danhgia`
    INNER JOIN `taikhoan`
    ON `danhgia`.`id_user` = `taikhoan`.`id`
    INNER JOIN `product`
    ON `danhgia`.`id_product` = `product`.`id`;";
    return getdata($sql);
}
function startb($id){
    $sql= "SELECT AVG(star) as star FROM `danhgia` WHERE id_product=$id";
    return getdata($sql);
}
function showdgbysp($id){
    $sql="SELECT `danhgia`.*, `taikhoan`.`hoten` AS `tennguoidanhgia`, `product`.`name` AS `tensanpham`
    FROM `danhgia`
    INNER JOIN `taikhoan`
    ON `danhgia`.`id_user` = `taikhoan`.`id`
    INNER JOIN `product`
    ON `danhgia`.`id_product` = `product`.`id` WHERE id_product=$id;";
    return getdata($sql);
}
function countdh( $id ){
    $sql= "SELECT COUNT(id_product) as sldg FROM danhgia WHERE id_product=$id";
    return getdata($sql);
}
function showonedg($id){
    $sql="SELECT * FROM danhgia WHERE id=".$id;
    return getdata($sql);
}
function   xoadg($id){
    $sql = "DELETE FROM `danhgia` WHERE id=".$id;
    delete($sql);
}
function adddg($id_user,$id_product,$star,$noidung,$ngaydang){
    $sql="INSERT INTO `danhgia`(`id_user`, `id_product`,`star`, `noidung`, `ngaydang`) 
    VALUES ('$id_user','$id_product','$star','$noidung','$ngaydang')";
    insert($sql);
}
function suadg($id,$id_user,$id_product,$star,$noidung,$ngaysua){
        $sql= "UPDATE `danhgia` SET `id_user`='$id_user',`id_product`='$id_product',`star`='$star',`noidung`='$noidung',`ngaysua`='$ngaysua' WHERE id=$id";
    update($sql);
    }