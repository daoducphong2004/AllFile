<?php
session_start();
include('pdo.php');
include('../model/danhmuc.php');
include('../model/sanpham.php');
include('../model/taikhoan.php');
include('../model/binhluan.php');
include('../model/pay.php');
include('../model/thongke.php');

if (isset($_SESSION['user_info'])) {
    $name = $_SESSION['user_info']['username'];
    foreach (show_tk() as $tk) {
        if ($name == $tk['user']) $iduser1 = $tk['id'];
    }
}
include_once("header.php");
if (isset($_SESSION['user_info']) && $_SESSION['user_info']['role'] == 1) {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                $e = '';
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['maloai'];
                    insert_dm($tenloai, $id);
                    $e = 'Thêm thành công';
                }
                include("danhmuc/add.php");
                break;

            case  'xoadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_dm($id);
                }
                include('danhmuc/list.php');
                break;
            case 'listdm':
                include('danhmuc/list.php');
                break;
            case 'suadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $dm = showone_dm($id);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if (isset($_POST['suadm']) && ($_POST['suadm'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    $id1 = $_POST['maloai'];
                    updatedm($tenloai, $id, $id1);
                    $e = 'Sửa thành công';
                }
                include('danhmuc/list.php');
                break;

                /* COntroler sản phẩm */
            case 'addsp':
                $e = '';
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['price'];
                    $img = imageupload();
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddm'];
                    $luotxem = $_POST['luotxem'];
                    insert_sp($tensp, $gia, $img, $mota, $iddm, $luotxem);
                    $e = 'Thêm thành công';
                }
                include("sanpham/add.php");
                break;

            case  'xoasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_sp($id);
                }
                include('sanpham/list.php');
                break;
            case 'listsp':
                if (isset($_POST['listok'])) {
                    $iddm = $_POST['iddm'];
                    $search = $_POST['search'];
                } else {
                    $iddm = "";
                    $search = 0;
                }
                $listdanhmuc = show_dm();
                $listsanpham = showall_sp($search, $iddm);
                include('sanpham/list.php');
                break;
            case 'suasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $sp = showone_sp($id);
                }
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if (isset($_POST['update'])) {
                    $id = $_GET['id'];
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['price'];
                    $img = imageuploadsp();
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddm'];
                    $luotxem = $_POST['luotxem'];
                    updatesp($id, $tensp, $gia, $img, $mota, $iddm, $luotxem);
                    $e = 'Thêm thành công';
                }
                include('sanpham/list.php');
                break;
                //khách hàng
            case 'addtk':
                if (isset($_POST['themmoi'])) {
                }
                include('taikhoan/add.php');
                break;
            case 'dskh':
                include('taikhoan/list.php');
                break;
            case  'xoatk':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_kh($id);
                }
                include('taikhoan/list.php');
                break;
                // bình luận
            case 'bl':
                include('binhluan/list.php');
                break;
            case  'xoabl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_bl($id);
                }
                include('binhluan/list.php');
                break;
            case 'donhang':

                include('donhang/list.php');
                break;
            case 'xoadh':
                $id = $_GET['id'];
                delete_donhang($id);
                include('donhang/list.php');
                break;
            case 'suadh':
                $id = $_GET['id'];
                $sp=showone_pay($id);
                include('donhang/update.php');
                break;
            case 'updatedh':
                if(isset($_POST['update'])){
                    $id = $_GET['id'];
                    $name = $_POST['tenkh'];
                    $trangthai=$_POST['trangthai'];
                    $ngaydathang=$_POST['ngaydathang'];
                    $ngaygiaohang=$_POST['ngaygiaohang'];
                    echo $ngaygiaohang;
                    $tongtien=$_POST['tongtien'];
                    updatedonhang($id, $name,$trangthai,$ngaydathang,$ngaygiaohang,$tongtien);
                }
                include('donhang/list.php');
                break;
            case 'thongke':
                include('thongke/thongke.php');
                break;
                //dèaut

            default:
                include_once("home.php");
                break;
        }
    } else {
        include_once("home.php");
    }
    include_once("footer.php");
}
// print_r($_SESSION['user_info']);
