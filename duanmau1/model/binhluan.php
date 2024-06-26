<?php
function insert_binhluan($nd, $iduser, $idpro,  $ngaybinhluan)
{
    $sql = "INSERT INTO binhluan ( noidung, iduser,idpro ,ngaybinhluan ) VALUES('$nd','$iduser','$idpro ', '$ngaybinhluan')";
    pdo_execute($sql);
}
function dsbl()
{
    $sql = "SELECT
    binhluan.id AS idbl,
    sanpham.id AS idsp,
    sanpham.name AS tensp,
    taikhoan.user AS tenkh,
    binhluan.noidung AS Nd,
    binhluan.ngaybinhluan AS nbl
  FROM binhluan
  INNER JOIN taikhoan ON binhluan.iduser = taikhoan.id
  INNER JOIN sanpham ON binhluan.idpro = sanpham.id;"; 
    $danhsachdm =  pdo_query($sql);
    return $danhsachdm;
}
function updatebl($id,$nd, $iduser,$idpro, $ngaybinhluan){
    $sql = "UPDATE binhluan SET noidung='$nd',iduser='$iduser',idpro='$idpro',ngaybinhluan='$ngaybinhluan'where id=".$id;
    pdo_execute($sql);
} 
function tenuserbl($idpro)
{
    $sql = "SELECT
    binhluan.noidung,
    binhluan.iduser,
    binhluan.ngaybinhluan,
    taikhoan.id,
    taikhoan.user
  FROM binhluan
  INNER JOIN taikhoan ON binhluan.iduser = taikhoan.id
  where idpro = $idpro";// Chỉ hiển thị bình luận của sản phẩm hiện tại
    $tenall_user = pdo_query($sql);
    return $tenall_user;
}
function delete_bl($id){
    $sql = "delete from binhluan where id=" .$id;
    pdo_execute($sql);
}
?>