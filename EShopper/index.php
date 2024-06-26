        <?php
        session_start();
        include "model/function.php";
        include "model/danhmuc.php";
        include "model/sanpham.php";
        include "model/contact.php";
        include "model/taikhoan.php";
        include "model/binhluan.php";
        include "model/danhgia.php";
        include "model/varians.php";
        include "model/cart.php";
        include "model/donhang.php";
        include "view/header.php";
        $dsdm=loadall_danhmuc();
        $spnew=loadall_sanpham_home();
        $dstop8=loadall_sanpham_top8();
        if(isset($_GET['act']) && $_GET['act']!=""){
            $act=$_GET['act'];
            switch($act){
                case "sanpham":
                    include "view/menu.php";
                    if(isset($_POST['kyw']) && $_POST['kyw']!=""){
                       $kyw = $_POST['kyw'];
                    }else{
                        $kyw="";
                    }
                    if (isset($_GET['sx'])) {
                        $sx = $_GET['sx'];
                    } else {
                        $sx = "";
                    }
                    if (isset($_POST['price'])) {
                        $range = $_POST['price'];
                    } else {
                        $range = "";
                    }
                    if(isset($_GET['iddm']) && $_GET['iddm']>0){
                        $iddm=$_GET['iddm'];
                    }else{
                        $iddm=0;
                    }
                    $tendm=load_ten_dm($iddm);
                    include "view/sanpham.php";
                    break;
            case "contact":
                include "view/menu.php";
                include "view/contact.php";
                break;
            case "sanphamct":
                if(isset($_GET['idsp'])&&$_GET['idsp']>0){
                    $id=$_GET['idsp'];
                    $onesp=loadone_sanpham($id);
                    $sp_cung_loai=load_sanphamcungloai($id,$onesp[0]['id_dm']);
                    update_luotxem($id);
                    include "view/menu.php";
                    include "view/sanphamct.php";
                }
                else{
                    include "view/menuslide.php";
                    include "view/home.php";
                }
                break;
                case "dangxuat":
                    unset($_SESSION['user']);
                    header('Location: index.php');
                    break;
                case "infouser":
                    include("view/menu.php");
                    include "view/inforuser.php";
                    break;
                case 'updateinfor':
                    if (isset($_POST['submit'])) {
                    $id = $_SESSION['user']['id'];
                    $avatar = imageuploadtk();
                    $name = $_POST['hoten'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    suainforuser($id, $email, $name, $phone, $avatar);
                    header("Location: index.php?act=infouser");
                    }
                    break;
                case "sendmessage":
                    if(isset($_POST['submit']) && $_POST['submit']){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];
                        addlienhe($name,$email,$message);  
                        header("Location: index.php?act=contact");
                    }
                    break;    
                    case 'upcomment':
                        $id_product = $_POST['id_product'];
                        if (isset($_POST['submit'])) {
                            $id_user = $_POST['id_user'];
                            $id_product = $_POST['id_product'];
                            $noidung = $_POST['noidung'];
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $ngaydang = date('Y-m-d H:i:s');
                            addbl($id_user, $id_product, $noidung, $ngaydang);
                        }
                        header('location:index.php?act=sanphamct&idsp=' . $id_product);
                        break;
                    case 'xoabl':
                        $id_bl = $_GET['id_bl'];
                        $id_product = $_GET['id_product'];
                        xoabl($id_bl);
                        header('Location: index.php?act=sanphamct&idsp=' . $id_product);
                        break;        
                        case 'dangdg':
                            if (isset($_POST['submit'])) {
                                $id_product = $_POST['id_product'];
                                $showctdh = showdhctbyid($id_product);
                                if (isset($_SESSION['user'])) {
                                    $id_user = $_SESSION['user']['id'];
                                    if (in_array($id_user, array_column($showctdh, 'id_user'))) {
                                        if ($showctdh[0]['danhgia'] == 'not') {
                                            $noidung = $_POST['noidung'];
                                            $star = $_POST['rating'];
                                            $ngaydang = date('Y-m-d H:i:s');
                                            adddg($id_user, $id_product, $star, $noidung, $ngaydang);
                                            updatettdanhgia($showctdh[0]['id']);
                                            $_SESSION['err'] = '<script>
                                        document.getElementById("error").innerHTML = "Đánh giá thành công!";
                                        document.getElementById("error").className = "form-group alert alert-success";
                                      </script>';
                                            header('Location:index.php?act=sanphamct&idsp=' . $id_product);
                                        } else {
                                            $_SESSION['err'] = '<script>
                                            document.getElementById("error").innerHTML = "Bạn đã đánh giá rồi!";
                                            document.getElementById("error").className = "form-group alert alert-danger";
                                          </script>';
                                            header('Location:index.php?act=sanphamct&idsp=' . $id_product);
                                        }
                                    } else {
                                        $_SESSION['err'] = '<script>
                                        document.getElementById("error").innerHTML = "Bạn chưa mua sản phẩm này nên không đánh giá được!";
                                        document.getElementById("error").className = "form-group alert alert-danger";
                                      </script>';
                                        header('Location:index.php?act=sanphamct&idsp=' . $id_product);
                                    }
                                } else {
                                    $_SESSION['err'] = $errdg = '<script>
                                    document.getElementById("error").innerHTML = "Bạn chưa đăng nhập ! Vui lòng đăng nhập để sử dụng chức năng này";
                                    document.getElementById("error").className = "form-group alert alert-danger";
                                  </script>';
                                  header('Location:index.php?act=sanphamct&idsp=' . $id_product);
                                }
                            }
                            break;
                            case 'xoaspincart':
                                $id = $_GET['id'];
                                xoaspincart($id);
                                include("view/menu.php");
                                include("view/cart.php");
                                break;
                                case 'quantityspincart':
                                    $id = $_POST['id'];
                                    $quantity = $_POST['quantity'];
                                    quantityspincart($id, $quantity);
                                    include("view/menu.php");
                                    include("view/cart.php");
                                    break;    
                            case "addsptocart":
                                if(isset($_POST['submit'])){
                                $id_user = $_SESSION["user"]["id"];
                                $id_product = $_POST["id_product"];
                                $id_cart = showidtocart($id_user);
                                $slsp = showslsp($id_product);
                                $slspincart = showsltocart($id_user, $id_product);
                                $size = $_POST['size'];
                                $color = $_POST['color'];
                                // echo $size ,$color;
                                $pv = showpbbyid($id_product);
                                // print_r($id_cart);
                                foreach ($pv as $key) {
                                    if ($size == $key['size_name'] && $color == $key['color_name']) {
                                         $id_pv= $key['id'];
                                        //  echo $id_pv;
                                    }           
                                }
                                if (array_column($slsp, 'quantity') > array_column($slspincart, 'quantity')) {
                                    if (in_array($id_product, array_column($id_cart, 'id_product'))) {
                                        if(in_array($id_pv, array_column($id_cart,'id_variants'))) {
                                        updatesl($id_product, $id_user, $id_pv);
                                        }else{
                                            addsptocart($id_product, $id_user,$id_pv);
                                        }
                                    } else {
                                        addsptocart($id_product, $id_user,$id_pv);
                                    }
                                } else {
                                    echo '<script>
                                          var error = document.createElement("div");
                                           error.innerHTML = "Số lượng sản phẩm trong giỏ hàng vượt quá số lượng sản phẩm hiện có trong kho!";
                                           error.className = "alert alert-danger";
                                           document.body.appendChild(error);
                                        </script>';
                                }
                                include('view/menu.php');
                                include('view/cart.php');
            
                                }
                                break;
                                case 'cart':
                                    include("view/menu.php");
                                    include("view/cart.php");
                                    break;
                                case 'formcheckout':
                                    include("view/menu.php");
                                    include("view/checkout.php");
                                    break;
                                case 'checkout':
                                    $id_user = $_SESSION['user']['id'];
                                    $hoten = $_POST['hoten'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $diachi = $_POST['sonha'] . ' ' . $_POST['huyen'] . ' ' . $_POST['thanhpho'];
                                    $pay = $_POST['payment'];
                                    $ngaydathang = date('Y-m-d H:i:s');
                                    $ngaygiaohang = date('Y-m-d H:i:s', strtotime($ngaydathang . ' +3 days'));
                                    $total = $_POST['total'];
                                    adddh($id_user, $ngaydathang, $ngaygiaohang, $hoten, $diachi, $phone, $email, $pay, $total);
                                    $cart = showcart($_SESSION["user"]["id"]);
                                    // print_r($cart);
                                    $sp = showalldhbyid($_SESSION["user"]["id"]);
                                    $last_row = reset($sp);
                                    $id_dh = reset($last_row);
                                    foreach ($cart as $key) {
                                        $id = $key["id"];
                                        $id_product = $key['id_product'];
                                        $id_variants = $key['id_variants'];
                                        $soluong = $key['quantity'];
                                        $total = $key['quantity'] * $key['price'];
                                        addctdh($id_dh, $id_product,$id_variants, $soluong, $total);
                                        truslsp($id_product, $soluong);
                                        xoaspincart($id);
                                    }
                                    include("view/menu.php");
                                    include('view/donhangdadat.php');
                                    break;
                                    case 'ctdonhang':
                                        if (isset($_SESSION['user'])) {
                                            $id = $_SESSION['user']['id'];
                                            include('view/menu.php');
                                            include('view/ctdonhang.php');
                                        }
                                        break;
                                        case 'dhdadat':
                                            include("view/menu.php");
                                            include('view/donhangdadat.php');
                                            break;
                                            case 'huydonhang':
                                                if(isset($_GET['id_dh'])){
                                                    $id_dh=$_GET['id_dh'];
                                                    huydonhang($id_dh);
                                                    header('Location:index.php?act=ctdonhang&id_dh='.$id_dh);
                                                }
                                                break;        
            }
        }else{
            include "view/menuslide.php";
            include "view/home.php";
        }
        include "view/footer.php";
        ?>