<?php
function insert_sp($tensp,$gia,$img,$mota,$iddm,$luotxem){
    $sql = "insert into sanpham(name,price,img,mota,iddm,luotxem) values('$tensp','$gia','$img','$mota','$iddm','$luotxem')";
    pdo_execute($sql);
}
function  delete_sp($id){
    $sql = "delete from sanpham where id=" .$id;
    pdo_execute($sql);
}
function showall_sp($search,$iddm){
    $sql = "select * from sanpham where 1";
    if($search!=""){
        $sql.=" and name like '%$search%'";
    }
    if($iddm>0){
        $sql.=" and iddm like '%$iddm%'";
    }
    $sql.=" order by name";
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
function show_sp(){
    $sql = "select * from sanpham order by name";
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
function showone_sp($id){
    $sql = "select *from sanpham where id=" . $id;
    return pdo_query_one($sql);
}
function updatesp($id,$tensp, $gia, $img, $mota, $iddm,$luotxem){
    $sql = "UPDATE sanpham SET name='$tensp',price='$gia',img='$img',mota='$mota',iddm='$iddm',luotxem='$luotxem' where id=".$id;
    pdo_execute($sql);
} 
function filter_sp($iddm) {
$sql="SELECT * FROM sanpham WHERE iddm =".$iddm;
return pdo_execute($sql);
}
function imageuploadsp(){
    //sử lý file ảnh
    $target_dir = "../view/images/";
    $img = $target_dir . basename($_FILES["img"]["name"]);

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $img)) {
        echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    return($img);
}
function showall_sp_home(){
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
function show_sp_cungloai($id,$iddm){
    $sql = "select * from sanpham where id <> ".$id." and iddm=".$iddm;
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
function showall_sp_cungloai($iddm){
    $sql = "select * from sanpham where iddm=".$iddm;
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
function top10sp(){
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 10;";
    $danhsachsp =  pdo_query($sql);
    return $danhsachsp;
}
?>
