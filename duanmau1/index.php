<?php
session_start();
include('model/pdo.php');
include('model/sanpham.php');
include('model/taikhoan.php');
include('model/danhmuc.php');
include('model/giohang.php');
include('model/pay.php');
include('view/header.php');
$err = '';
if(isset($_SESSION['user_info'])){
    $name=$_SESSION['user_info']['username'];
    foreach(show_tk() as $tk){
        if($name==$tk['user']) $iduser1=$tk['id'];
    }
}       
if(isset($_SESSION['err_login'])&&$_SESSION['err_login']==''){
    $_SESSION['err_login']='';
}
$spnew = showall_sp_home();
if (isset($_GET["act"]) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "sanphamct":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $onesp = showone_sp($id);
                include 'view/sanphamct.php';
            } else {
                include 'view/sanphamct.php';
            }
            break;
        case "sanpham":
            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
                $allsp = showall_sp_cungloai($iddm);
                include 'view/sanpham.php';
            } else {
                include 'view/home.php';
            }
            break;
        case "searchsp":
            if (isset($_POST['submit']) && ($_POST['search'] != "")) {
                $search = $_POST['search'];
                $allsp = showall_sp($search, 0);
                include 'view/sanpham.php';
            } else {
                include 'view/home.php';
            }
            break;
        case "gioithieu":
            include 'view/gioithieu.php';
            break;
        case "dangky":
            $err = '';
            if (isset($_POST['submit']) && ($_POST['user'] != '') && ($_POST['pass'] != '')) {
                $name = test_input($_POST['user']);
                $password = test_input($_POST['pass']);
                $repassword = test_input($_POST['repass']);
                $email = test_input($_POST['email']);
                if ($password === $repassword) {
                    // kiểm tra username có tồn tại hay không
                    $tenuser = ktrauserdk($name);
                    $temp = empty($tenuser) ? 0 : count($tenuser);
                    if ($temp > 0) {
                        // Có user name sẽ báo lỗi
                        $err = "Đã có username vui lòng chọn username khác";
                    } else {
                        insert_tk($name, $password, $email);
                        $err = "Đăng ký thành công !";
                    }
                } else {
                    $err = 'Nhập sai mật khẩu vui lòng nhập lại';
                }
            }
            include 'view/taikhoan/dangky.php';
            break;
        case "dangnhap":
            if (isset($_POST['submit'])) {
                $name = $_POST['user'];
                $password = $_POST['pass'];
                $taikhoan = show_tk();
                foreach ($taikhoan as $user) {
                    if (($user['user'] == $name) &&
                        ($user['pass'] == $password)
                    ) {
                        $_SESSION['user_info'] = array('username' => $name, 'password' => $password, 'id' => $user['id'], 'role' => $user['role']);
                        // $err="Đăng nhập thành công";
                        header('Location:index.php');
                    } else {
                        $err_login = 'Sai mật khẩu hoặc tài khoản';
                        $_SESSION['err_login'] = $err_login;
                        header('Location:index.php');
                    }
                }
            }
            break;
        case "quenpass":
            $id = $_SESSION['user_info']['id'];
            // echo $id;
            $tks = showone_tk($id);
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                foreach ($tks as $user) {
                    if ($user['email'] == $email) {
                        $err = 'Mật khẩu là' . $user['pass'] . '<br>';
                    } else {
                        $err = 'Email không đúng vui lòng nhập lại <br>';
                    }
                }
            }
            include "view/taikhoan/quenpass.php";
            break;
        case 'cart':
            if (isset($_POST['fixquantity'])) {
                $id = $_POST['idcart'];
                $quantity = $_POST['quantity'];
                // echo $id;
                // echo $quantity;
                fixquantity($id, $quantity);
            }
            if (isset($_POST['deletecart'])) {
                $id = $_POST['idcart'];
                deletecart($id);
            }
            include 'view/cart/cart.php';
            break;
        case 'addtocart':
            if (isset($_POST['addtocart'])) {
                $idpro = $_POST['id'];
                $quantity = $_POST['quantity'];
                $iduser = $iduser1;
                $cart = show_idproincart($iduser);
                // print_r($cart);
                if (in_array($idpro, $cart)) {
                    addquantity($idpro,$iduser);
                } else {
                    addtocart($iduser, $idpro, $quantity);
                }
            }
            include 'view/cart/cart.php';
            break;
        case 'thoat':
            session_unset();
            header('location:index.php');
            break;
        case 'edit_tk':
            if (isset($_POST['submit'])) {
                $password = test_input($_POST['pass']);
                $email = test_input($_POST['email']);
                $tel = test_input($_POST['tel']);
                $address = test_input($_POST['address']);
                $id = $_SESSION['user_info']['id']; 
                updatetk( $password, $email, $address, $tel, $id);
                echo 'cập nhật thông tin tài khoản thành công';
            }
            include('view/taikhoan/edit_tk.php');
            break;
        case 'pay':
            if(isset($_POST['pay'])){
                $total= $_SESSION['total'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $tel=$_POST['tel'];
                $address=$_POST['address'];
                $now = date('Y-m-d');
                $date = date('Y-m-d', strtotime ('+3 days', strtotime($now)));
                $trangthai='Đang chuẩn bị hàng';
                creatpay($iduser1,$total,$name,$trangthai,$now,$date);
                clearcart($iduser1);
                include('view/pay/donhangdatao.php');
            }
            include('view/pay/pay.php');
            break;
        case 'donhangdatao':
            include('view/pay/donhangdatao.php');
            break;
        case 'huydonhang':
            $id=$_GET['id'];
            huydonhang($id);
            include('view/pay/donhangdatao.php');

            break;
        case "lienhe":
            include 'view/lienhe.php';
            break;
        default:
            include 'view/home.php';
            break;
    }
} else include('view/home.php');
include('view/footer.php');
