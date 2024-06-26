<?php
session_start();
if(isset($_POST['submit'])){
    $id= filter_input(INPUT_POST , 'id',FILTER_SANITIZE_SPECIAL_CHARS);
    $pass= $_POST['pass'];
    if($pass=='ahihi123'&&$id=='phong232004'){
        $_SESSION['id ']=$id;
        header('Location:login.php');
    }
    else{
        echo"sai rồi";
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
</head>
<body>
    <h1>Login to your account</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label for="id">ID:</label>
    <input type="text" name="id" id="">
    <br>
    <label for="pass">Password</label>
    <input type="password" name="pass">
    <button type="submit" id="submit" name="submit">Đăng nhập</button>
    </form>
    
</body>
</html>