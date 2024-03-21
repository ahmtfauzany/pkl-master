<style>
	.wrapper {
		background-color: rgba(0, 0, 0, 0.5);
		/* Ubah nilai alpha sesuai kebutuhan gelapnya */
		padding: 50px;
		/* Sesuaikan padding sesuai kebutuhan Anda */
		border-radius: 20px;
		/* Untuk sudut yang lebih lembut */
		color: white;
		/* Untuk memastikan teks terlihat baik di atas latar belakang gelap */
	}

	.btn-login {
		border-radius: 5px;
		/* width: 100px; */
		color: #fff;
		font-size: 16px;
		font-weight: 500;
		padding: 5px 20px;
		background: #333;
		border: 1px solid #fff;
		cursor: pointer;
		margin-right: 200px;
		/* Sesuaikan nilai margin-right sesuai kebutuhan Anda */
	}

	.wrapper form .row {
		height: 45px;
		margin-bottom: 20px;
		position: relative;
	}

	.wrapper form .row input {
		height: 100%;
		width: 100%;
		outline: none;
		padding-left: 60px;
		border-radius: 5px;
		border: 1px solid l#333;
		font-size: 16px;
		transition: all 0.3s ease;
	}

	.wrapper form .row i {
		position: absolute;
		width: 47px;
		height: 100%;
		color: #fff;
		font-size: 18px;
		background: #333;
		border: 1px solid white;
		border-radius: 5px 0 0 5px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>
<img src="./foto/laptop1.jpg" style="width: 100vw; height: 100vh; object-fit: cover;">
<div class=" kontainer">
	<div class="kotak">
		<div class="wrapper">
			<p style="padding: 50px 10px; text-align-last: center;">
				<img src="<?php echo base_url('foto/default1.png') ?>" height="150">
			</p>
			<div style="text-align: center; font-size:250%;"><strong>LOGIN MAN3-APP</strong></div>
			<form action="" method="post">
				<div class="row">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" required="" autofocus="" name="username" placeholder="Username" class="form-control flat">
				</div>
				<div class="row">
					<i class="icon-lock2"></i>
					<input type="password" required="" name="password" placeholder="Password" class="form-control flat">
				</div>
				<br>
				<br>
				<div class="row text-right" style="margin-bottom: -70px; margin-top: -10%;">
					<button type="submit" name="btnlogin" class="btn btn-login"><span class="fa fa-random"></span> &nbsp;<b>LOGIN</b></button>
				</div>
				<br>
			</form>
		</div>
		<br>