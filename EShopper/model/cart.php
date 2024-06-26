<?php 
function addsptocart($id_product,$id_user,$id_pv){
    $sql="INSERT INTO `giohang`(`id_user`, `id_product`, `id_variants`, `quantity`) VALUES ('$id_user','$id_product','$id_pv',1)";
    insert($sql);
}
function showcart($id){
    $sql= "SELECT
    giohang.id,
    giohang.id_user,
    giohang.id_product,
    product.img,
    product.name,
    product.price,
    giohang.id_variants,
    product.quantity as slsp,
    giohang.quantity
  FROM giohang
  INNER JOIN product ON giohang.id_product = product.id where giohang.id_user=$id"; 
  return getdata($sql);
}
function xoaspincart($id){
  $sql= "DELETE FROM `giohang` WHERE id=$id";
  delete($sql);
}
function add1sp($id,$id_user){
  $sql= "UPDATE `giohang` SET `quantity`='quantity'+1 WHERE id=$id AND id_user=$id_user";
  insert($sql);
}
function quantityspincart($id,$quantity){
  $sql= "UPDATE `giohang` SET `quantity`='$quantity' WHERE id=$id";
  update($sql);
}
function updatesl($id_product,$id_user,$id_pv){
$sql  = "UPDATE `giohang` SET `quantity`=`quantity`+1 WHERE `id_product`=$id_product AND `id_user`=$id_user AND id_variants= $id_pv" ;
update($sql);
}
function showidtocart($id_user){
  $sql= "SELECT id_product,id_variants FROM `giohang` WHERE id_user=$id_user";
  return getdata($sql);
}
function showsltocart($id_user,$id_product){
  $sql= "SELECT sum(quantity) as quantity FROM `giohang` WHERE id_user=$id_user AND id_product=$id_product";
  return getdata($sql);
}

function countsp($id_user){
  $sql = "SELECT COUNT(id_product) as 'sl' FROM `giohang` WHERE id_user=$id_user";
  return getdata($sql);
}