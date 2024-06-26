<?php 
function showalltk(){
    $sql='SELECT*FROM taikhoan';
    return getdata($sql);
}
function showallnv(){
    $sql='SELECT*FROM taikhoan WHERE vaitro= "nhanvien"';
    return getdata($sql);
}
function showonetk($id){
    $sql='SELECT*FROM taikhoan WHERE id='.$id;
    return getdata($sql);
}
function showonetk1($name){
    $sql="SELECT*FROM taikhoan WHERE `user`= '$name'";
    return getdata($sql);
}
function xoatk($id){
    $sql = "DELETE FROM `taikhoan` WHERE id=".$id;
     delete($sql);
  }
function addtk($user,$pass,$email,$hoten,$phone,$ngaytao,$vaitro,$avatar){
    $sql= "INSERT INTO `taikhoan`(`user`, `pass`, `email`, `hoten`, `phone`, `ngaytao`, `vaitro`, `avatar`) VALUES 
    ('$user','$pass','$email','$hoten','$phone','$ngaytao','$vaitro','$avatar')";
    insert($sql);
}
function imageuploadtk(){
    //sử lý file ảnh
    $target_dir = "image/avatar/";
    $img = basename($_FILES["img"]["name"]);
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir . $img)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your file.";
    }
    return("../image/avatar/".$img);
}
function suainforuser($id,$email,$hoten,$phone,$avatar){
    $sql="UPDATE `taikhoan` SET 
    `email`='$email',`hoten`='$hoten',`phone`='$phone',`avatar`='$avatar' WHERE id=".$id;
    update($sql);
}
function suatk($id,$user,$pass,$email,$hoten,$phone,$vaitro,$avatar){
    $sql="UPDATE `taikhoan` SET 
    `user`='$user',`pass`='$pass',`email`='$email',`hoten`='$hoten',`phone`='$phone',`vaitro`='$vaitro',`avatar`='$avatar' WHERE id=".$id;
    update($sql);
}
?>