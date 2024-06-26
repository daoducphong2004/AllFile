<?php
function loadall_thongke(){
    $a="select danhmuc.id as madm, danhmuc.name as tendm, count(product.id) as countsp, min(product.price) as minprice, max(product.price) as maxprice, avg(product.price) as avgprice";
    $a.=" from product left join danhmuc on danhmuc.id=product.id_dm";
    $a.=" group by danhmuc.id order by danhmuc.id";
    $listthongke=pdo_query($a);
    return $listthongke; 
}
function showdh1($year,$month){
    $sql="SELECT 
    COUNT(id) AS 'donhang', SUM(tong) AS 'doanhthu',
    COUNT(CASE WHEN trangthai = 'đã giao hàng' THEN 1 END) AS 'donthanhcong',
    SUM(CASE WHEN trangthai = 'đã giao hàng' THEN tong END) AS 'doanhthuthuc',
    COUNT(CASE WHEN trangthai = 'đã hủy' THEN 1 END) AS 'donhuy'  
    FROM donhang WHERE 1";
    if($year!=""){
        $sql.=' AND YEAR(ngaydathang)= '.$year;
    }
    if($month!=""){
        $sql.=' AND MONTH(ngaydathang) = '.$month;
    }
    return   pdo_query($sql);
}
function countslsp($year,$month){
$sql="SELECT SUM(chitietdonhang.soluong) as slsp , donhang.ngaygiaohang FROM chitietdonhang JOIN donhang ON donhang.id = chitietdonhang.id_donhang";
if($year!=""){
    $sql.=' AND YEAR(donhang.ngaydathang)= '.$year;
}
if($month!=""){
    $sql.=' AND MONTH(donhang.ngaydathang) = '.$month;
}
return pdo_query($sql);
}

?>