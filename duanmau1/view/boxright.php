<div class="row mb">
    <div class="boxtitle">
        Tài Khoản
    </div>
    <div class="boxcontent formtaikhoan">
        <?php
        if (isset($_SESSION['user_info'])&&$_SESSION['user_info']['role']==1) {
                // print_r($_SESSION['user_info']);
                extract($_SESSION['user_info']);
        ?>

            <h3>Xin chào: <?php echo $username ;?></h3>
            <li><a href="index.php?act=donhangdatao">Đơn Hàng Của bạn</a></li>
            <li><a href="index.php?act=quenpass">Quên mật khẩu</a></li>
            <li><a href="index.php?act=edit_tk">Cập nhật tài khoản</a></li>
            <li><a href="admin/index.php">Đăng Nhập Admin</a></li>
            <li><a href="index.php?act=thoat">Thoát</a></li>
        <?php
        } elseif(isset($_SESSION['user_info'])){
            extract($_SESSION['user_info']);
            ?>
    
                <h3>Xin chào: <?php echo $username ;?></h3>
                <li><a href="index.php?act=quenpass">Quên mật khẩu</a></li>
                <li><a href="index.php?act=edit_tk">Cập nhật tài khoản</a></li>
                <li><a href="index.php?act=thoat">Thoát</a></li>
            <?php

        }

        else {
        ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                    <label for="user">Tên Đăng Nhập</label><br>
                    <input type="text" name="user" id="">
                </div>
                <div class="row mb10">
                    <label for="password">Mật Khẩu</label><br>
                    <input type="password" name="pass" id="">
                </div>
                <div class="row mb10">
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoản <br>
                    <input type="submit" name='submit' value="Đăng Nhập"><br>
                </div>
                <li><?php if(isset($_SESSION['err_login'])) echo $_SESSION['err_login']?></li>
            </form>
            <li><a href="index.php?act=quenmatkhau">Quên mật khẩu</a></li>
            <li><a href="index.php?act=dangky">Đăng Ký thành viên</a></li>
        <?php } ?>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">
        Danh Mục
    </div>
    <div class="boxcontent2 menudoc">
        <ul>
            <!-- <li><a href="#">Trinh Thám</a></li>
                    <li><a href="#">Romantic</a></li>
                    <li><a href="#">Comedy</a></li>
                    <li><a href="#">Slice of life</a></li> -->
            <?php
            $danhmuc = show_dm();
            foreach ($danhmuc as $dm) : ?>
                <li><a href="index.php?act=sanpham&iddm=<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="boxfooter searchbox">
        <form action="index.php?act=searchsp" method='post'>
            <input type="text" placeholder="Nhập vào" name="search" id="">
            <button name='submit'>Tìm Kiếm</button>
        </form>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">
        Top 10 yêu thích
    </div>
    <div class="row boxcontent storytop10">
        <?php
        $sps = top10sp();
        foreach ($sps as $sp) : ?>
            <div class="row mb10 top10">
                <a href="index.php?act=sanphamct&id=<?php echo $sp['id']?>">
                    <div class="img">
                        <?php $img = substr($sp['img'], 3);
                        ?>
                        <img src="<?php echo $img ?>" alt="">
                    </div>
                    <p><?php echo $sp['name'] ?></p>
                </a>
            </div>

        <?php endforeach ?>
    </div>
</div>