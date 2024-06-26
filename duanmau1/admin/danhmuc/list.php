<div class="row">
      <div class="row mb formtitle">
        <h1>Danh sách loại hàng</h1>
        <div class="row"></div>
      </div>
      <div class="row formcontent"> 
        <div class="row mb10 formdanhsach">
            <table >
                <tr>
                    <th></th>
                    <th>Mã Loại</th>
                    <th>Tên Loại</th>
                    <th></th>
                </tr>
                <?php 
                foreach(show_dm() as $danhmuc):
                ?>
                    <?php 
                    $suadm='index.php?act=suadm&id='.$danhmuc['id'];
                    $xoadm='index.php?act=xoadm&id='.$danhmuc['id'];
                    ?>
                    <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><?php echo $danhmuc['id']?></td>
                    <td><?php echo $danhmuc['name']?></td>
                    <td>
                            <a href='<?php echo $suadm?>'><input type="submit" value="Sửa"></a>
                            <a href="<?php echo $xoadm?>"><input type="submit" value="Xoá"></a>
                            
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
          </div>

          <div class="row mb20">
            <input type="button" value="Chọn Tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xoá tất cả các mục đã chọn">
           <a href="index.php?act=adddm"> <input type="button" value="Nhập Thêm"></a>
          </div>
      </div>
    </div>