<div class="row">
  <div class="row mb formtitle">
    <h1>Cập Nhật Loại Hàng Hoá</h1>
    <div class="row"></div>
  </div>
  <div class="row formcontent">
    <form action="index.php?act=updatedm" method="post">
      <?php
      $e='';
      if (is_array($dm)) :
      ?>
          <input type="hidden" name="id" value="<?php echo $dm['id']?>">
          <div class="row mb20">
            Mã Loại: <input type="text" value="<?php echo $dm['id']?>" name="maloai" id="">
          </div>
          <div class="row mb20">
            Tên Loại <input type="text" value="<?php echo $dm['name']?>" name="tenloai" id="">
          </div>

      <?php 
      endif;
      ?>
      <div class="row mb20">
        <input type="submit" name='suadm' value="Sửa">
        <input type="reset" value="Nhập lại">
        <a href="index.php?act=listdm"> <input type="button" value="Danh Sách"></a>
      </div>
      <?php echo $e; ?>
    </form>
  </div>
</div>
</div>