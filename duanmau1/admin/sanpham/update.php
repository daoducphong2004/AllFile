<form action="index.php?act=updatesp&id=<?php echo $sp['id']?>" enctype="multipart/form-data" method="post">
  <div class="row mb20">
    Mã Sản Phẩm
    <input type="number" disabled value="<?php echo $sp['id'] ?>" name="id" id="">
  </div>
  <div class="row mb20">
    Tên Sản Phẩm
    <input type="text" value="<?php echo $sp['name'] ?>" name="tensp">
  </div>
  <div class="row mb20">
    Giá Sản Phẩm
    <input type="number" value="<?php echo $sp['price'] ?>" name='price'>
  </div>
  <div class="row mb20">
    Hình
    <input type="file" url="<?php echo $sp['img'] ?>" name="img" id="">
  </div>
  <div class="row mb20 ">
    mô tả sản phẩm
    <textarea name='mota' cols='30' rows='10'><?php echo $sp['mota'] ?></textarea>
  </div>
  <div class="row mb20">
    lượt xem sản phẩm
    <input type="number" value="<?php echo $sp['luotxem'] ?>" name="luotxem" id="">
  </div>
  <label for="danhmuc">Chọn danh mục:</label>
  <select id="danhmuc" name="iddm">
    <?php
    $all_dm = show_dm();
    foreach ($all_dm as $dm) :
    ?>
      <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
    <?php endforeach ?>
  </select>
  <div class="row mb20">
    <input type="submit" name='update' value="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?act=listsp"> <input type="button" value="Danh Sách"></a>
  </div>
  <?php echo $e; ?>
</form>