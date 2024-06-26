  <!-- Navbar Start -->
  <div class="container-fluid">
      <div class="row border-top px-xl-5">
          <div class="col-lg-3 d-none d-lg-block">
              <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                  data-toggle="collapse" href="#navbar-vertical"
                  style="height: 65px; margin-top: -1px; padding: 0 30px;">
                  <h6 class="m-0">Danh mục</h6>
                  <i class="fa fa-angle-down text-dark"></i>
              </a>
              <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                  id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                  <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                      <?php
                foreach($dsdm as $dm){
                  extract($dm);
                  $linkdm="index.php?act=sanpham&iddm=".$id;
                  echo '<a class="nav-item nav-link" href="'.$linkdm.'">'.$name.'</a>';
                }
                ?>
                  </div>
              </nav>
          </div>
          <div class="col-lg-9">
              <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                  <a href="" class="text-decoration-none d-block d-lg-none">
                      <h1 class="m-0 display-5 font-weight-semi-bold"><span
                              class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                  </a>
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                      <div class="navbar-nav mr-auto py-0">
                          <a href="index.php" class="nav-item nav-link">Trang Chủ</a>
                          <a href="index.php?act=sanpham" class="nav-item nav-link">Sản Phẩm</a>
                          <a href="index.php?act=contact" class="nav-item nav-link">Liên Hệ</a>
                      </div>
                      <?php
                        if (isset($_SESSION['user'])) :
                        ?>
                      <nav class="navbar navbar-expand-lg navbar-light">
                          <?php 
                         $tk=showonetk1($_SESSION['user']['username']); 
                         ?>
                          <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden;"> <img
                                  style=" width: 100%; height: 100%; object-fit: cover;"
                                  src="adminduanmau/<?=$tk[0]['avatar']?>" alt="avatar"></div>
                          <ul class="navbar-nav ml-auto">
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" style="padding: 10px 10px;" href="#"
                                      data-toggle="dropdown"><?php echo $_SESSION['user']['username'] ?></a>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <li><a class="dropdown-item" href="index.php?act=infouser">Thông Tin</a></li>
                                      <?php if($_SESSION['user']['vaitro']=="admin"||$_SESSION['user']['vaitro']=="nhanvien"){?>
                                      <li><a class="dropdown-item" href="adminduanmau/index.php">Admin</a></li>
                                      <?php }; ?>
                                      <li><a class="dropdown-item" href="index.php?act=dhdadat">Đơn Hàng</a></li>
                                      <li><a class="dropdown-item" href="index.php?act=dangxuat">Đăng Xuất</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </nav>
                      <?php endif ?>
                      <?php
                        if (!isset($_SESSION['user'])) :
                        ?>
                      <div class="navbar-nav ml-auto py-0">
                          <a href="view/login.php" class="nav-item nav-link">Đăng Nhập</a>
                          <a href="view/signup.php" class="nav-item nav-link">Đăng Ký</a>
                      </div>
                      <?php endif ?>
                  </div>
              </nav>
          </div>
      </div>
  </div>
  <!-- Navbar End -->