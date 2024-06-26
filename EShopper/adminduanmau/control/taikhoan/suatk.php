<div class="container-fluid">
    <?php if(isset($_GET['id'])){
        $id = $_GET['id'];
        $tk=showonetk($id);
    }?>
<form action="index.php?act=suatk" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value='<?php echo $tk[0]['id']?>'>
<div class="form-group">
    <label for="user">Tên đăng nhập</label>
    <input type="text" class="form-control" id="user" value="<?php echo $tk[0]['user']?>" name="user" required>
  </div>
  <div class="form-group">
    <label for="pass">Mật khẩu</label>
    <input type="password" class="form-control" value="<?php echo $tk[0]['pass']?>" id="pass" name="pass" required>
  </div>
  <div class="form-group">
    <label for="hoten">Họ tên</label>
    <input type="text" class="form-control" value="<?php echo $tk[0]['hoten']?>" id="hoten" name="hoten" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $tk[0]['email']?>" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="phone">Số điện thoại</label>
    <input type="number" class="form-control" value="<?php echo $tk[0]['phone']?>" id="phone" name="phone" required>
  </div>
  <div class="form-group">
    <label for="img">Ảnh đại diện</label>
    <input type="file" class="form-control-file" id="img" name="img">
  </div>
  <div class="form-group">
    <label for="vai-tro">Vai trò</label>
    <select class="form-control" id="vai-tro" name="vai-tro">
      <option value="khachhang">Khách hàng</option>
      <option value="admin">Admin</option>
      <option value="nhanvien">Nhân Viên</option>
    </select>
  </div>
  <button type="submit" name='submit' class="btn btn-primary">Sửa</button>
</form>
</div>