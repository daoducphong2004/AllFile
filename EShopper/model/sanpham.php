<?php
function loadall_sanpham_home() {
    $a = "SELECT * FROM `product` ORDER BY `id` DESC LIMIT 0,8";
    $listsanpham=getdata($a);
    return $listsanpham;
}
function loadall_sanpham_top8() {
    $a = "SELECT * FROM `product` ORDER BY `luotxem` DESC LIMIT 0,8";
    $listsanpham=getdata($a);
    return $listsanpham;
}
function loadall_sanpham($page,$kyw,$iddm,$range,$sx) {
    $a = "SELECT * FROM `product` WHERE 1";
    if($range!=""){
    $a.=" AND `price` BETWEEN $range AND ".$range+100;
    $a.=" ORDER BY id desc";
    }
    if($kyw!=""){
        $a.=" AND `name` LIKE '%".$kyw."%'";
        $a.=" ORDER BY id desc";
    }
    if($iddm>0){
        $a.=" AND `id_dm` = '".$iddm."'";
        $a.=" ORDER BY id desc";
    }
    if($sx!=""){
        if($sx=="moinhat"){
            $a.=" ORDER BY id DESC";
        }elseif($sx=="giathap"){
            $a.=" ORDER BY price ASC";
        }else {
            $a.=" ORDER BY price DESC";
        }
    }
    if($kyw==""&&$iddm<=0&&$sx==""&&$range==""){
        $a.=" ORDER BY id DESC";
    }
    $limit = 12;
    $offset = ($page - 1) * $limit;
    $a.= " LIMIT $offset, $limit";
    $listsanpham=getdata($a);
    return $listsanpham;
}
function load_ten_dm($iddm) {
    if($iddm>0){
    $dm=getdata("SELECT * FROM `danhmuc` WHERE `id`=".$iddm);
    return $dm;
    }else{
    return "";
}
}
function loadone_sanpham($id) {
    $sp=getdata("SELECT * FROM `product` WHERE `id`=".$id);
    return $sp;
}
function load_sanphamcungloai($id,$iddm) {
    $listsanpham=getdata("SELECT * FROM `product` WHERE `id_dm`=".$iddm." AND `id` <> ".$id." ORDER BY `id` DESC");
    return $listsanpham;
}
function update_luotxem($id) {
    update("UPDATE `product`SET `luotxem`= `luotxem`+ 1 WHERE `id`=".$id);
}
function showspbypage($page) {
    $limit = 12;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `product` WHERE 1 LIMIT $offset, $limit";
    return getdata($sql);
}
function pagenumbers(){
    $sql= "SELECT COUNT(id) as slsp FROM `product` WHERE 1;";
    return getdata($sql);
}
function countsp1($key){
    $sql= "SELECT COUNT(quantity) as sl FROM `product` ";
    if($key!= ""){
        $sql.= "WHERE price BETWEEN $key AND ".$key+100;
    }
    return getdata($sql);
  }
  function showslsp($id_product){
    $sql= "SELECT `quantity` FROM `product` WHERE id=$id_product";
    return getdata($sql);
}  
function truslsp($id,$quantity){
    $sql="UPDATE `product` SET `quantity`=quantity-$quantity WHERE id=$id";
    update($sql);
}
?>