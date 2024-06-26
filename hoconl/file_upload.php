<?php
if(isset($_POST['submit'])){
    $permitted_extensions=['png','jpg','jpeg','gif'];
    $file_name=$_FILES['upload']['name'];
    if(!empty($file_name)){
        // print_r($_FILES);
        $file_size=$_FILES['upload']['size'];
        $file_tmp_name=$_FILES['upload']['tmp_name'];
        $generated_file_name=time().'-'.$file_name;
        $destination_path="uploads/${generated_file_name}";
        $file_extension=explode('.',$file_name);
        $file_extension=strtolower(end($file_extension));
        // echo "$file_name <br>, $file_tmp_name <br>, $destination_path <br>, $file_extension";
        if(in_array($file_extension,$permitted_extensions)){
            if($file_size<=1000000){
                move_uploaded_file($file_tmp_name,$destination_path);
                $error_message="<p style='color:blue'>oke</p>";
            }else{
                $error_message="<p style='color:red'>file so big</p>";
            }
        }   else{
            $error_message="<p style='color:red'>ddinhj dangj file khong dung</p>";
        }
    }else{
        $error_message="<p style='color:red'>Không có ảnh đƯợc chọn</p>";
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
    <h1>File upload in PHP</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"
     method="POST"
     enctype="multipart/form-data"
     >
    choose your image to upload
    <input type="file" name="upload">
    <input type="submit" value="submit" name="submit">
    </form>
    <?php echo $error_message ?? ''; ?>
</body>
</html>