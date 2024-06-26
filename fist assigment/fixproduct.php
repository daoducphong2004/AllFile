<?php
$conn = "";
try {
    $servername = "localhost";
    $dbname = "lightnov_asseiment";
    $username = "root";
    $password = "";
    $conn = new PDO(
        "mysql:host=$servername; dbname=$dbname",
        $username,
        $password
    );
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// Tạo truy vấn
$query = 'SELECT * FROM products';
// Thực thi truy vấn
$results = $conn->query($query);
// Lặp qua kết quả
foreach ($results as $row) {
    // Lấy giá trị của mỗi cột
    $id = $row['id'];
    $name = $row['name'];
    $desc = $row['desc'];
    $price = $row['price'];
    $rrp = $row['rrp'];
    $quantity = $row['quantity'];
    $img = $row['img'];
    $date_added = $row['date_added'];
    // Thêm giá trị vào mảng
    $products[] = array(
        'id' => $id,
        'name' => $name,
        'desc' => $desc,
        'price' => $price,
        'rrp' => $rrp,
        'quantity' => $quantity,
        'img' => $img,
        'date_added' => $date_added
    );
}
if (isset($_POST['update'])) {
    // Loop through the products array
    foreach ($products as $product) {
        // Get the new values from the submitted form data
        $new_name = $_POST['name-' . $product['id']];
        $new_desc = $_POST['desc-' . $product['id']];
        $new_price = $_POST['price-' . $product['id']];
        $new_quantity = $_POST['quantity-' . $product['id']];

        // Create a SQL statement to update the product information
        $stmt = $conn->prepare('UPDATE products SET name = :name, `desc` = :desc, price = :price, quantity = :quantity WHERE id = :id');

        // Bind the new values and product ID to the statement
        $stmt->bindValue(':name', $new_name);
        $stmt->bindValue(':desc', $new_desc);
        $stmt->bindValue(':price', $new_price);
        $stmt->bindValue(':quantity', $new_quantity);
        $stmt->bindValue(':id', $product['id']);

        // Execute the statement
        $stmt->execute();
    }
}
if (isset($_POST['remove'])) {
    // Loop through the products array
    foreach ($products as $product) {
        // Get the new values from the submitted form data
        $product_id = $product['id'];
        // Create a SQL statement to update the product information
        $sql = "DELETE FROM products WHERE id = :id";
        // Bind the new values and product ID to the statement
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $product_id);
        // Execute the statement
        $stmt->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <form action="" method="POST">
        <table class='table'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Name Fix</th>
                <th>Description</th> 
                <th>Description Fix</th>
                <th>Price</th>
                <th>Price Fix</th>
                <th>RRP</th>
                <th>RRP Fix</th>
                <th>Quantity</th>
                <th>Quantity Fix</th>
                <th>Image</th>
                <th>Date Added</th>
                <th>TO</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td>
                        <input type="text" name="name-<?= $product['id'] ?>" value="<?= $product['name'] ?>" placeholder="Name">
                    </td>
                    <td><?= $product['desc'] ?></td>
                    <td>
                        <input type="text" name="desc-<?= $product['id'] ?>" value="<?= $product['desc'] ?>" placeholder="Desc">
                    </td>
                    <td><?= $product['price'] ?></td>
                    <td> <input type="number" name="price-<?= $product['id'] ?>" value="<?= $product['price'] ?>" min="0" step="0.01" placeholder="Price"></td>
                    <td><?= $product['rrp'] ?></td>
                    <td> <input type="number" name="rrp-<?= $product['id'] ?>" value="<?= $product['rrp'] ?>" min="0" step="0.01" placeholder="rrp">
                    </td>
                    <td><?= $product['quantity'] ?></td>
                    <td>
                        <input type="number" name="quantity-<?= $product['id'] ?>" value="<?= $product['quantity'] ?>" min="0" placeholder="Quantity">
                    </td>
                    <td><img src="img product/<?= $product['img'] ?>" width="50" height="50" alt="<?= $product['name'] ?>"></td>
                    <td><?= $product['date_added'] ?></td>
                    <td><input type="submit" value="1" name="update">
                    <td><input type="submit" value="2" name="remove">

                    </td>
                </tr>
            <?php endforeach; ?>

    </form>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>