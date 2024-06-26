<?php
function insert_dm($tenloai,$id){
    $sql = "insert into danhmuc(name,id) values('$tenloai','$id')";
    pdo_execute($sql);
}
function  delete_dm($id){
    $sql = "delete from danhmuc where id=" .$id;
    pdo_execute($sql);
}
function show_dm(){
    $sql = "select * from danhmuc order by name";
    $danhsachdm =  pdo_query($sql);
    return $danhsachdm;
}
function showone_dm($id){
    $sql = "select * from danhmuc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function updatedm($tenloai,$id,$id1){
    $sql = "update danhmuc set id='$id1', name='$tenloai' where id=".$id;
    pdo_execute($sql);
}
function imageupload(){
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
?>