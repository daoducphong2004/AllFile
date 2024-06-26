<div class="container-fluid">
    <?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $dh=showonedh($id);
    }
    ?>
    <form action="index.php?act=suadh" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value='<?php echo $dh[0]['id']?>'>

        <div class="form-group">
            <label for="ngaydathang">Ngày đặt hàng</label>
            <input type="datetime" class="form-control" value="<?php echo $dh[0]['ngaydathang']?>" disabled
                id="ngaydathang" name="ngaydathang" required>
        </div>
        <div class="form-group">
            <label for="ngaygiaohang">Ngày giao hàng</label>
            <input type="datetime" class="form-control" value="<?php echo $dh[0]['ngaygiaohang']?>" id="ngaygiaohang"
                name="ngaygiaohang" required>
        </div>
        <div class="form-group">
            <label for="trangthai">Trạng Thái Đơn hàng</label>
            <select class="form-control" id="trangthai" name="trangthai">
                <option
                    <?=($dh[0]['trangthai']=="Đang chuẩn bị hàng"||$dh[0]['trangthai']=="Đang giao hàng") ? "disabled" : ""?>
                    value="Đang chuẩn bị hàng">
                    Đang chuẩn bị hàng</option>
                <option <?=($dh[0]['trangthai']=="Đang giao hàng") ? "disabled" : ""?> value="Đang giao hàng">Đang
                    giao hàng</option>
                <option value="Đã giao hàng">Đã giao hàng</option>
            </select>
        </div>
        <button type="submit" name='submit' class="btn btn-primary">Sửa</button>
    </form>
</div>