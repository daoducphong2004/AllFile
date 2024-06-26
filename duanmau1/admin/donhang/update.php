<form action="index.php?act=updatedh&id=<?php echo $sp[0]['id']?>"  method="post">
  <div class="row mb20">
    Mã Đơn hàng
    <input type="number" disabled value="<?php echo $sp[0]['id'] ?>" name="id" id="">
  </div>
  <div class="row mb20">
    Tên Khánh hàng
    <input type="text" value="<?php echo $sp[0]['name'] ?>" name="tenkh">
  </div>
  <div class="row mb20">
    trạng thái
    <input type="text" value="<?php echo $sp[0]['trangthai'] ?>" name='trangthai'>
  </div>
  <div class="row mb20 ">
    ngày đặt hàng
    <input type="date" value="<?php echo $sp[0]['ngaydathang']?>" name='ngaydathang'>
  </div>
  <div class="row mb20">
    ngày giao hàng
    <input type="date" value="<?php echo $sp[0]['ngaygiaohang']?>" name='ngaygiaohang'>
  </div>
  <div class="row mb20">
    Tổng tiền
  <input type="text" value="<?php echo $sp[0]['tongtien']?>" name='tongtien'>
  </div>
  <div class="row mb20">
    <input type="submit" name='update' value="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?act=donhang"> <input type="button" value="Danh Sách"></a>
  </div>
  <?php echo $e; ?>
</form>