<div class="row">
  <div class="row mb formtitle">
    <h1>Thêm Mới Tài Khoản</h1>
    <div class="row"></div>
  </div>
  <div class="row formcontent">
    <form action="index.php?act=addtk" enctype="multipart/form-data" method="post">
      <div class="row mb20">
        username
        <input type="text" name="user">
      </div>
      <div class="row mb20">
        Password
        <input type="text" name="pass">
      </div>
      <div class="row mb20">
        Email
        <input type="text" name='email'>
      </div>
      <div class="row mb20">
        Địa Chỉ
        <input type="text" name="address" id="">
      </div>
      <div class="row mb20 ">
        số điện thoại
        <input type="text" name="tel" id="">
      </div>
      <div class="row mb20">
        vai trò
        <input type="number" name='role'>
      </div>
      <div class="row mb20">
        <input type="submit" name='themmoi' value="Thêm Mới">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listsp"> <input type="button" value="Danh Sách"></a>
      </div>
      <?php echo $e; ?>
    </form>
  </div>
</div>
</div>