<div class="row">
  <div class="row mb formtitle">
    <h1>Danh sách loại hàng</h1>
    <div class="row"></div>
  </div>
  <form class="mb20" action="index.php?act=listsp" method="post">
    <input type="text" name="search">
    <select name="iddm" id="">
      <option value="">Tất cả</option>
      <?php
      $all_dm = show_dm();
      foreach ($all_dm as $dm) :
      ?>
        <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
      <?php endforeach ?>
    </select>

    <input type="submit" name="listok" value="OK">
  </form>
  <div class="row formcontent">
    <div class="row mb10 formdanhsach">

      <table>
        <tr>
          <th></th>
          <th>Mã Sản Phẩm</th>
          <th>Tên Loại </th>
          <th>Giá</th>
          <th>Hình ảnh</th>
          <th>Mô tả</th>
          <th></th>
          <th></th>
          <th>Lượt xem</th>
          <th>Mã danh mục</th>
          <th></th>
        </tr>
        <?php
        foreach (showall_sp($search, $iddm) as $sanpham) :
        ?>
          <?php
          $suasp = 'index.php?act=suasp&id=' . $sanpham['id'];
          $xoasp = 'index.php?act=xoasp&id=' . $sanpham['id'];
          ?>
          <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td><?php echo $sanpham['id'] ?></td>
            <td><?php echo $sanpham['name'] ?></td>
            <td><?php echo $sanpham['price'] ?></td>
            <td><img src="<?php echo $sanpham['img'] ?>" alt=""></td>
            <td colspan="3"><?php echo $sanpham['mota'] ?></td>
            <td><?php echo $sanpham['luotxem'] ?></td>
            <td><?php echo $sanpham['iddm'] ?></td>
            <td>
              <a href='<?php echo $suasp ?>'><input type="submit" value="Sửa"></a>
              <a href="<?php echo $xoasp ?>"><input type="submit" value="Xoá"></a>
            </td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>

    <div class="row mb20">
      <input type="button" value="Chọn Tất cả">
      <input type="button" value="Bỏ chọn tất cả">
      <input type="button" value="Xoá tất cả các sản phẩm đã chọn">
      <a href="index.php?act=addsp"> <input type="button" value="Nhập Thêm"></a>
    </div>
  </div>
</div>