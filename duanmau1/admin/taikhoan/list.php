<div class="row">
  <div class="row mb formtitle">
    <h1>Danh sách tài khoản</h1>
    <div class="row"></div>
  </div>
  <form class="mb20" action="index.php?act=listtk" method="post">
    <input type="text" name="search">
    <select name="iddm" id="">
      <option value="">Tất cả</option>
      <?php
      $all_dm=show_dm();
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
          <th>ID</th>
          <th>UserName</th>
          <th>Password</th>
          <th>Email</th>
          <th>Địa Chỉ</th>
          <th>Số Điện Thoại</th>
          <th>Vai Tròi</th>
          <th></th>
        </tr>
        <?php
        foreach (show_tk() as $tk) :
        ?>
          <?php
          $suatk = 'index.php?act=suatk&id=' . $tk['id'];
          $xoatk = 'index.php?act=xoatk&id=' . $tk['id'];
          ?>
          <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td><?php echo $tk['id'] ?></td>
            <td><?php echo $tk['user'] ?></td>
            <td><?php echo $tk['pass'] ?></td>
            <td><?php echo $tk['email'] ?></td>
            <td><?php echo $tk['address'] ?></td>
            <td><?php echo $tk['tel'] ?></td>
            <td><?php echo $tk['role'] ?></td>
            <td>
              <a href='<?php echo $suatk ?>'><input type="submit" value="Sửa"></a>
              <a href="<?php echo $xoatk ?>"><input type="submit" value="Xoá"></a>
            </td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>

    <div class="row mb20">
      <input type="button" value="Chọn Tất cả">
      <input type="button" value="Bỏ chọn tất cả">
      <input type="button" value="Xoá tất cả các sản phẩm đã chọn">
      <a href="index.php?act=addtk"> <input type="button" value="Nhập Thêm"></a>
    </div>
  </div>
</div>