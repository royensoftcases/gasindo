<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Simaung Jamkrindo</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="icon" href="<?php echo base_url()?>assets/img/icon.png">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/util.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main_login.css">
		

	</head>
	
	<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form" action="<?php echo base_url("index.php/Login/masuk");?>" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-20" style="font-size: 25px;">
						HALAMAN LOGIN
					</span>
					<span class="login100-form-avatar" style="width: 100%;height: 123px;">
						<img src="<?php echo base_url();?>assets/img/logo.png" alt="SIMAUNG">
					</span> 

					<div class="wrap-input100 validate-input m-t-25 m-b-10" data-validate = "Enter username">
						<input class="input100" type="text" name="username" required placeholder="USERNAME">
					</div>
					<div class="wrap-input100 validate-input m-t-5 m-b-10" data-validate = "Enter username">
						<input class="input100" type="password" name="password" placeholder="PASSWORD" required>
					</div>
					<div class="wrap-input100 validate-input m-t-5 m-b-10" data-validate = "Pilih Tahun">
						<select class="input100" id="tahun_param" name="tahun_param" required>
                                       <?php
                                       for ($year = (int)date('Y'); 2019 <= $year; $year--): ?>
                                         <option value="<?=$year;?>"><?=$year;?></option>
                                       <?php endfor; ?>
                                      </select>
					</div><br>
 
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
