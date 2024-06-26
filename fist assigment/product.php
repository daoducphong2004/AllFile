<?php
// // Kiểm tra để đảm bảo tham số id được chỉ định trong URL
if (isset($_GET['id'])) {
    // câu truy vấn sẽ lấy tất cả các cột từ bảng products trong cơ sở dữ liệu, với điều kiện là giá trị của cột id bằng với giá trị của biến $_GET['id'].
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
 // Lấy sản phẩm từ cơ sở dữ liệu và trả về kết quả dưới dạng Mảng
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
   // Kiểm tra xem sản phẩm có tồn tại không (mảng không trống)
    if (!$product) {
  //hiển thị nếu id của sản phẩm không tồn tại (mảng trống)
        exit('Product does not exist!');
    }
} else {
    // hiển thị nếu id không được chỉ định
    exit('Product does not exist!');
}
?>

<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="img product/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>

<?=template_footer()?>