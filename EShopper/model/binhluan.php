<?php 
function showallbl(){
    $sql="SELECT `binhluan`.*, `taikhoan`.`hoten` AS `tennguoibinhluan`, `product`.`name` AS `tensanpham`
    FROM `binhluan`
    INNER JOIN `taikhoan`
    ON `binhluan`.`id_user` = `taikhoan`.`id`
    INNER JOIN `product`
    ON `binhluan`.`id_product` = `product`.`id`;";
    return getdata($sql);
}
function showblbysp($id_product){
    $sql= "SELECT `binhluan`.*, `taikhoan`.`hoten`, `product`.`name` AS `tensanpham`
    FROM `binhluan`
    INNER JOIN `taikhoan`
    ON `binhluan`.`id_user` = `taikhoan`.`id`
    INNER JOIN `product`
    ON `binhluan`.`id_product` = `product`.`id`
    WHERE id_product=$id_product;";
    return getdata($sql);
}
function showonebl($id){
    $sql="SELECT * FROM binhluan WHERE id=".$id;
    return getdata($sql);
}
function   xoabl($id){
    $sql = "DELETE FROM `binhluan` WHERE id=".$id;
    delete($sql);
}
function addbl($id_user,$id_product,$noidung,$ngaydang){
    $sql="INSERT INTO `binhluan`(`id_user`, `id_product`, `noidung`, `ngaydang`) 
    VALUES ('$id_user','$id_product','$noidung','$ngaydang')";
    insert($sql);
}
function suabl($id,$id_user,$id_product,$noidung,$ngaysua){
        $sql= "UPDATE `binhluan` SET `id_user`='$id_user',`id_product`='$id_product',`noidung`='$noidung',`ngaysua`='$ngaysua' WHERE id=$id";
    update($sql);
    }
?>