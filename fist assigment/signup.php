<?php
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = "asseiment";
// $conn = mysqli_connect($servername, $username, $password, "$dbname");
// if (!$conn) {
//    die('Could not Connect MySql Server:' . mysql_error());
// }
// 
?>

<?php
// $err = '';
// if (isset($_POST['submit'])) {

//    $name = $_POST['username'];
//    $password = $_POST['password'];
//    $repassword = $_POST['repassword'];
//    if ($password === $repassword) {
//       // Check if the entered username already exists in the accounts table
//       $check_username_query = "SELECT * FROM accounts WHERE username='$name'";
//       $result = mysqli_query($conn, $check_username_query);
//       if (mysqli_num_rows($result) > 0) {
//          // Có user name sẽ báo lỗi
//          $err = "Đã có username vui lòng chọn username khác";
//       } 
//       else {
//          // tạo người dùng mới
//          $sql = "INSERT INTO accounts (username,password)
//          VALUES ('$name','$password')";
//          if (mysqli_query($conn, $sql)) {
//             echo "Đăng ký thành công !";
//          } else {
//             $err= "Error: " . $sql . ":-" . mysqli_error($conn);
//          }
//       }
//       mysqli_close($conn);
//    }
//    else{
//       $err='Nhập sai mật khẩu vui lòng nhập lại';
//    }
// }
?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Đăng Ký</title>
   <link rel="stylesheet" href="style1.css">
</head>

<body>
   <div class="wrapper">
      <div class="title">
         Đăng Ký
      </div>
      <form method="POST">
         <div class="field">
            <input type="text" name='username' required>
            <label>UserName</label>
         </div>
         <div class="field">
            <input type="password" name='password' required>
            <label>Mật khẩu</label>

         </div>
         <div class="field">
            <input type="password" name='repassword' required>
            <label>Nhập lại mật khẩu</label>

         </div>
         <div class="content">
            <p><? //php echo $err 
               ?></p>
         </div>
         <div class="field">
            <input type="submit" name="submit" value="login">
         </div>
         <div class="signup-link">
            Đã đăng ký ? <a href="login.php">Đăng nhập ngay </a>
         </div>
      </form>
   </div>
</body>

</html> -->

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "lightnov_asseiment";
try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die('Could not Connect MySql Server:' . $e->getMessage());
}
?>

<?php
$err = '';
if (isset($_POST['submit'])) {

   $name = $_POST['username'];
   $password = $_POST['password'];
   $repassword = $_POST['repassword'];
   if ($password === $repassword) {
      // kiểm tra username có tồn tại hay không
      $check_username_query = "SELECT * FROM users WHERE user='$name'";
      $stmt = $conn->prepare($check_username_query);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         // Có user name sẽ báo lỗi
         $err = "Đã có username vui lòng chọn username khác";
      } else {
         // tạo người dùng mới
         $sql = "INSERT INTO users (user,pass)
         VALUES ('$name','$password')";
         if ($conn->exec($sql)) {
            echo "Đăng ký thành công !";
         }
      }
   } else {
      $err = 'Nhập sai mật khẩu vui lòng nhập lại';
   }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Đăng Ký</title>
   <link rel="stylesheet" href="style1.css">
</head>

<body>
   <div class="wrapper">
      <div class="title">
         Đăng Ký
      </div>
      <form method="POST">
         <div class="field">
            <input type="text" name='username' required>
            <label>UserName</label>
         </div>
         <div class="field">
            <input type="password" name='password' required>
            <label>Mật khẩu</label>

         </div>
         <div class="field">
            <input type="password" name='repassword' required>
            <label>Nhập lại mật khẩu</label>

         </div>
         <div class="content">
            <p><?php echo $err ?></p>
         </div>
         <div class="field">
            <input type="submit" name="submit" value="login">
         </div>
         <div class="signup-link">
            Đã đăng ký ? <a href="index.php?page=login">Đăng nhập ngay </a>
         </div>
      </form>
   </div>
</body>

</html>