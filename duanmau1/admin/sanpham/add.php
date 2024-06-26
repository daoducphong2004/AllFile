<div class="row">
  <div class="row mb formtitle">
    <h1>Thêm Mới Sản Phẩm</h1>
    <div class="row"></div>
  </div>
  <div class="row formcontent">
    <form action="index.php?act=addsp" enctype="multipart/form-data" method="post">
      <div class="row mb20">
        Mã Sản Phẩm
        <input type="text" disabled name="masp">
      </div>
      <div class="row mb20">
        Tên Sản Phẩm
        <input type="text" name="tensp">
      </div>
      <div class="row mb20">
        Giá Sản Phẩm
        <input type="text" name='price'>
      </div>
      <div class="row mb20">
        Hình
        <input type="file" name="img" id="">
      </div>
      <div class="row mb20 ">
        mô tả sản phẩm
        <textarea name='mota' cols='30' rows='10'></textarea>
      </div>
      <div class="row mb20">
        Lượt xem
        <input type="text" name='luotxem'>
      </div>
      <div class="row mb20">

        <label for="danhmuc">Chọn danh mục:</label>
        <select id="danhmuc" name="iddm">
          <?php
          $all_dm = show_dm();
          foreach ($all_dm as $dm) :
          ?>
            <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
          <?php endforeach ?>
        </select>


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