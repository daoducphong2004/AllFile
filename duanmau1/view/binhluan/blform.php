<?php
session_start();
include("../../model/pdo.php");
include("../../model/binhluan.php");
include("../../model/taikhoan.php");
$idpro = $_REQUEST['idpro'];
if(isset($_SESSION['user_info'])){
    $name=$_SESSION['user_info']['username'];
    foreach(show_tk() as $tk){
        if($name==$tk['user']) $iduser1=$tk['id'];
    }
}  
// $dsbl = dsbl($idpro); // Chỉ hiển thị bình luận của sản phẩm hiện tại
// $test=date("Y-m-d H:i:s");
// print_r($test);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .binhluan table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }
        .binhluan table th,
        .binhluan table td {
            border: 1px solid #ccc;
            padding: 5px;
        }
        .binhluan table th {
            background-color: #f2f2f2;
        }
        .binhluan table td {
            text-align: left;
        }
        .binhluan table td:first-child {
            width: 50%;
        }
        .binhluan table td:last-child {
            width: 25%;
        }
        .binhluan form {
            margin-top: 10px;
        }
        .binhluan input[type="text"] {
            width: 100%;
            padding: 5px;
        }

        .binhluan input[type="submit"] {
            background-color: #000;
            color: #fff;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="row mb">
        <div class="boxtitle">Bình Luận</div>
        <div class="boxcontent2 binhluan">

            <table>
                <th>Tên người dùng</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <?php
                $dsbl = tenuserbl($idpro);
                foreach ($dsbl as $bl) {
                    echo '<tr><td>' . $bl['user'] . '</td>';
                    echo '<td>' . $bl['noidung'] . '</td>';
                    echo '<td>' . $bl['ngaybinhluan'] . '</td>';
                }
                ?>
            </table>
        </div>
        <?php 
        if(isset($iduser1)):
        ?>
        <div class="boxfooter binhluanform">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="idpro" value="<?php echo $idpro ?>">
                <input type="text" name="noidung" id="">
                <input type="submit" value="Gửi" name="guibl">
            </form>
        </div>
            <?php endif?>
        <?php
        if (isset($_POST['guibl'])) {
            $nd = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user_info']['id'];
            $ngaybinhluan = date("Y-m-d H:i:s");
            insert_binhluan($nd, $iduser, $idpro, $ngaybinhluan); // Thêm tham số $idpro vào hàm insert_binhluan() để lưu bình luận cho sản phẩm hiện tại
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</body>

</html>
