<?php 
function creatpay($iduser,$total,$name,$trangthai,$ngaydathang,$ngaygiaohang){
    $sql = "insert into donhang( `iduser`,`name`,`tongtien`, `trangthai`, `ngaydathang`, `ngaygiaohang`) values('$iduser','$name','$total','$trangthai','$ngaydathang','$ngaygiaohang')";
    pdo_execute($sql);
}
function show_pay($id){
    $sql='SELECT * FROM `donhang` WHERE iduser='.$id;
    return pdo_query($sql);
}
function delete_donhang( $id  ){
    $sql = "DELETE FROM `donhang` WHERE id=".$id;
    pdo_execute($sql);
}
function showall_pay(){
    $sql='SELECT * FROM `donhang` WHERE 1';
    return pdo_query($sql);
}
function showone_pay($id){
    $sql='SELECT * FROM `donhang` WHERE id='.$id;
    return pdo_query($sql);
}
function updatedonhang($id, $name,$trangthai,$ngaydathang,$ngaygiaohang,$tongtien){
    $sql= "UPDATE `donhang` SET `name`='$name',`tongtien`='$tongtien',`trangthai`='$trangthai',`ngaydathang`='$ngaydathang',`ngaygiaohang`='$ngaygiaohang' WHERE id=".$id;
    pdo_execute($sql);

}
function huydonhang($id){
    $sql= "UPDATE `donhang` SET `trangthai`='Đã huỷ' WHERE id=".$id;
    pdo_execute($sql);

}
?>