<div class="row">
      <div class="row mb formtitle">
        <h1>Thêm Mới Loại Hàng Hoá</h1>
        <div class="row"></div>
      </div>
      <div class="row formcontent"> 
        <form action="index.php?act=adddm" method="post">
          <div class="row mb20">
            Mã Loại: <input type="text" name="maloai" id="">
          </div>
          <div class="row mb20">
            Tên Loại <input type="text" name="tenloai" id="">
          </div>
          <div class="row mb20">
            <input type="submit" name='themmoi' value="Thêm Mới">
            <input type="reset" value="Nhập lại">
           <a href="index.php?act=listdm"> <input type="button" value="Danh Sách"></a>
          </div>
          <?php echo $e;?>
        </form>
      </div>
    </div>
  </div> 