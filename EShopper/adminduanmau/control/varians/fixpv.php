<div class="container-fluid">
    <form method="post" action="index.php?act=fixpv">
        <h1>Sửa biến Thể</h1>
        <?php $pv=showonepvbyid($id) 
        ?>
        <input type="hidden" value="<?php echo $pv[0]['id']?>"  name="id">
        <input type="hidden" value="<?php echo $pv[0]['product_id']?>"  name="id_product">
        <div class="mb-3">
            <div class="form-group">
                <label for="id_color">Màu Sắc:</label>
                <select name="id_color" id='id_color' class="form-control">
                    <?php foreach (showallcolor() as $key) : ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="size">Kích Thước:</label>
                <select name="id_size" id='id_size' class="form-control">
                    <?php foreach (showallsize() as $key) : ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
  
        <div class="mb-3">
            <div class="form-group">
                <label for="quantity">Số Lượng</label>
                <input type="number" value="<?php echo $pv[0]['product_variant_quantity']?>" class="form-control" name="quantity" id="quantity">
            </div>
        </div>
        <button type="submit" name='submit' class="btn btn-primary">Sửa</button>
    </form>

</div>