<?php 
function addtocart($iduser,$idpro,$quantity){
    $sql = "insert into giohang(iduser,idpro,quantity) values('$iduser','$idpro','$quantity')";
    pdo_execute($sql);
}
function addquantity($idpro,$iduser){
    $sql = "UPDATE giohang SET quantity = quantity +1 where idpro=".$idpro." AND iduser=".$iduser ;
    pdo_execute($sql);
}
function show_idproincart($iduser)
{
    $sql = 'SELECT idpro FROM `giohang` WHERE iduser='.$iduser;
    $danhsachsp = pdo_query($sql);

    $arr = [];
    foreach ($danhsachsp as $row) {
        $arr[] = $row['idpro'];
    }

    return $arr;
}
function  deletecart($id){
    $sql = "delete from giohang where id=" .$id;
    pdo_execute($sql);
}
function  clearcart($id){
    $sql = "delete from giohang where iduser=".$id;
    pdo_execute($sql);
}
function fixquantity($id,$quantity){
    $sql = "update giohang set quantity='$quantity' where id=".$id;
    pdo_execute($sql);
}
function show_cart($iduser){
    $sql = "SELECT
    giohang.id,
    sanpham.img,
    sanpham.name,
    sanpham.price,
    giohang.quantity
  FROM
    giohang
  JOIN
    sanpham
  ON
    giohang.idpro = sanpham.id where iduser=".$iduser;
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
?>
