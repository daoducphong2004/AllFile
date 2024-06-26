<?php
function insert_tk($user,$pass,$email){
    $sql = "insert into taikhoan(user,pass,email) values('$user','$pass','$email')";
    pdo_execute($sql);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function show_tk(){
    $sql = "select * from taikhoan order by user";
    $danhsachtk =  pdo_query($sql);
    return $danhsachtk;
}
function showone_tk($id){
    $sql = "select * from taikhoan where id=".$id;
    $tk =  pdo_query($sql);
    return $tk;
}
function ktrauserdk($name){
    $sql="SELECT * FROM taikhoan WHERE user='$name'";
    $danhsachtk =  pdo_query_one($sql);
    return $danhsachtk;
}
function updatetk($password, $email,$address, $tel,$id){
    $sql = "UPDATE taikhoan SET pass='$password',email='$email',address='$address',tel='$tel'where id=".$id;
    pdo_execute($sql);
} 
function filter_tk($search){
    $sql = "select * from taikhoan where 1";
    if($search!=""){
        $sql.=" and name like '%$search%'";
    }
    $sql.=" order by name";
    $danhsachtk =  pdo_query($sql);
    return $danhsachtk;
}
function delete_kh($id){
    $sql = "delete from taikhoan where id=" .$id;
    pdo_execute($sql);
}
?>