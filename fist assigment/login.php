
<?php
 $conn = "";
 try {
     $servername = "localhost";
     $dbname = "lightnov_asseiment";
     $username = "root";
     $password = "";
   
     $conn = new PDO(
         "mysql:host=$servername; dbname=$dbname",
         $username, $password
     );
      
    $conn->setAttribute(PDO::ATTR_ERRMODE,
                     PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
 }
  
 ?>
<?php
$err='';
function test_input($data) {
     
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $username = test_input($_POST["username"]);
   $password = test_input($_POST["password"]);
   $stmt = $conn->prepare("SELECT * FROM users");
   $stmt->execute();
   $users = $stmt->fetchAll();
    
   foreach($users as $user) {
        
       if(($user['user'] == $username) &&
           ($user['pass'] == $password)) 
           {
               $err='Đăng nhập thành công';
               if (isset($_POST['remember-me'])) {
                  setcookie('username', $username, time() + 30 * 24 * 60 * 60);
                  setcookie('password', $password, time() + 30 * 24 * 60 * 60);
               } else {
                  setcookie('username', '', time() - 1);
                  setcookie('password', '', time() - 1);
               }
               header('Location: index.php');
               exit();

            }
       else {
            $err='Sai mật khẩu hoặc tài khoản';

       }
   }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Đăng Nhập</title>
      <link rel="stylesheet" href="style1.css">
   </head>
   <body>
      <a href="addproduct.php">Thêm sản phẩm</a>
      <div class="wrapper">
         <div class="title">
            Đăng Nhập
         </div>
         <form  method="POST">
            <div class="field">
               <input type="text" name='username' required>
               <label>UserName</label>
            </div>
            <div class="field">
               <input type="password" name='password' required>
               <label>Mật Khẩu</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Nhớ mật khẩu</label>
               </div>
               <div class="pass-link">
                  <a href="#">Quên mật khẩu?</a>
               </div>
            </div>
            <div class="content">
               <?php  echo '<p>'.$err.'</p>' ?>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="login">               
            </div>
            <div class="signup-link">
               Chưa đăng ký ? <a href="index.php?page=signup">Đăng ký ngay</a>
            </div>
            <div class="signup-link">
            Đã đăng nhập ? <a href="index.php">Vào trang chủ</a>
            </div>
         </form>
      </div>
   </body>
</html>