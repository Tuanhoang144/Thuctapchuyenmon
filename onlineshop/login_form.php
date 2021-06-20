<?php

if (isset($_POST["login_user_with_product"])) {
	$product_list = $_POST["product_id"];
	$json_e = json_encode($product_list);
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);
}
?>
	<div class="wait overlay">
		<div class="loader"></div>
	</div>
	<div class="container-fluid">
					<div class="login-marg">
								<form onsubmit="return false" id="login" class="login100-form ">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Login Here</h2>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                       <label for="email">Email</label>
                                        <input class="input input-borders" type="email" name="email" placeholder="Email" id="password" required>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label for="email">Password</label>
                                        <input class="input input-borders" type="password" name="password" placeholder="password" id="password" required>
                                    </div>
                                    
                                    <div class="text-pad">
                                       <a href="#" data-toggle="modal" data-target="#forgot">
                                           forget password ?
                                       </a>
                                    </div>
                                    
                                        <input class="primary-btn btn-block"   type="submit"  Value="Login">
                                        
                                        <div class="panel-footer"><div class="alert alert-danger"><h4 id="e_msg"></h4></div></div>
										
										<a href="loginfb.php" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
                                </div>
                                
								</form>
                           
						<!-- Shiping Details -->
						
						<!-- /Shiping Details -->

						<!-- Order notes -->
						
						<!-- /Order notes -->
					</div>
					<?php
	if(isset($_POST['forgot']))
	{
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$confirmpassword = md5($_POST['confirmpassword']);
		$query = mysqli_query($con, "SELECT * FROM user_info WHERE email='$email' ");
		$num = mysqli_fetch_array($query);
		if($password == $confirmpassword){
			if($num>0)
			{
				mysqli_query($con, "UPDATE user_info set password='$password' WHERE email='$email'  ");
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
					<!-- Order Details -->
					
					<!-- /Order Details -->
				
				<!-- /row -->
			</div>