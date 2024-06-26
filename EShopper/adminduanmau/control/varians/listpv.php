<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sản phẩm biến thể</h4>
                    <h1>Chọn sản phẩm</h1>
                    <form action="index.php?act=formlistpv" method="POST">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="sp">Sản phẩm:</label>
                                <select name="id_sp" id='sp' class="form-control">
                                    <?php foreach (showallsp() as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button class='btn btn-primary'>OK</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Size</th>
                                    <th class="border-top-0">Color</th>
                                    <th class="border-top-0">Số lượng</th>
                                    <!-- 
            SELECT
  product.id AS product_id,
  product.name AS product_name,
  product.img AS product_img,
  product_variants.product_id AS product_variant_product_id,
  size.name AS size_name,
  color.name AS color_name,
  product_variants.quantity AS product_variant_quantity
FROM product product
JOIN product_variants product_variants ON product.id = product_variants.product_id
JOIN size size ON product_variants.size_id = size.id
JOIN color color ON product_variants.color_id = color.id WHERE  product.id=$id; 
         -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['id_sp'])):
                                    $id=$_POST['id_sp'];
                                    echo "<h1>".showpbbyid($id)[0]['product_name']."</h1>";
                                foreach (showpbbyid($id) as $key) :

                                    $sua = 'index.php?act=formfixpv&id=' . $key['id'];
                                    $xoa = 'index.php?act=xoapv&id=' . $key['id'];
                                ?>
                                <tr>
                                    <td><?php echo $key['product_id'] ?></td>
                                    <td><?php echo $key['size_name'] ?></td>
                                    <td><?php echo $key['color_name'] ?></td>
                                    <td><?php echo $key['product_variant_quantity'] ?></td>
                                    <td>
                                        <a href='<?php echo $sua ?>'><input class='btn btn-primary' type="submit"
                                                value="Sửa"></a>
                                        <a href="<?php echo $xoa ?>"><input class='btn btn-primary' type="submit"
                                                value="Xoá"></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                                      endif
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="index.php?act=formaddpv" style="margin-top: 10px;"><input type="submit" class="btn btn-primary"
                        value="Thêm Biến Thể Sản Phẩm"></a>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->