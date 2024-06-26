<div class="row">
	<div class="boxtitle">Đăng Ký</div>
	<div class="row boxcontent pdb10">
		<form action="index.php?act=dangky" method="post" class='formsigup'>
			<label for="user">User:</label>
			<input type="text" id="user" name="user" required>

			<label for="pass">Password:</label>
			<input type="password" id="pass" name="pass" required>

			<label for="repass">RePassword:</label>
			<input type="password" id="pass" name="repass" required>


			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<label for="address">Address:</label>
			<input type="text" id="address" name="address">

			<label for="tel">Telephone:</label>
			<input type="tel" id="tel" name="tel">
			<?php echo $err?>
			<input type="submit" name='submit' value="Cập Nhật Thông Tin">
		</form>
	</div>
</div>