<?php
	if(isset($_POST['forgot']))
	{
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = md5($_POST['password']);
		$confirmpassword = md5($_POST['confirmpassword']);
		$query = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email='$email' and phone = '$phone'");
		$num = mysqli_fetch_array($query);
		if($password == $confirmpassword){
			if($num>0)
			{
				mysqli_query($con, "UPDATE tbl_khachhang set password='$password' WHERE email='$email' and phone = '$phone' ");
				echo "<script>alert('Thay đổi mật khẩu thành công.');</script>";
			}
			else
			{
				header('Location:index.php');
				echo "<script>alert('Email hoặc mật khẩu không đúng!!!');</script>";
			}
		}
		else
		{
				header('Location:index.php');
				echo "<script>alert('Mật khẩu và xác nhận mật khẩu không đúng !!!');</script>";
		}

	}
?>
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				
					<h5 class="modal-title">Quên mật khẩu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">New password</label>
							<input type="password" class="form-control" placeholder="" name="password"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirm password</label>
							<input type="password" class="form-control" placeholder="" name="confirmpassword"  required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="forgot" value="Đổi mật khẩu">
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>