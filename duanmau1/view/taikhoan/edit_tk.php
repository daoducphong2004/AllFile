<?php 
// extract($_SESSION['user_info']);
// print_r($_SESSION['user_info']);
$id=$_SESSION['user_info']['id'];
// echo $id;
$tks=showone_tk($id);
?>
<div class="row">
	<div class="boxtitle">Sửa Đổi Thông Tin Tài khoản</div>
	<div class="row boxcontent pdb10">
		<form action="index.php?act=edit_tk" class="formsigup" method="post" >
			<?php foreach ($tks as $tk):?>
			<label for="pass">Password:</label>
			<input type="password" id="pass" value="<?php echo $tk['pass'] ?>" name="pass" required>

			<label for="email">Email:</label>
			<input type="email" id="email" value="<?php echo $tk['email']?>" name="email" required>

			<label for="address">Address:</label>
			<input type="text" id="address" value="<?php echo $tk['address']?>" name="address">

			<label for="tel">Telephone:</label>
			<input type="tel" value="<?php echo $tk['tel']?>" id="tel" name="tel">
			<?php endforeach?>
			<?php echo $err?>
			<input type="submit" name='submit' value="Cập Nhật Thông Tin">
	</div>
</div>