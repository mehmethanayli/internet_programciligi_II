<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Php Form Uygulaması</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>

<body>

	<div id="container">
		<h1>Personel Kayıt Formu</h1>

		<div id="body">
			<p>Lütfen Kullanıcı Adı ve Şifrenizi Oluşturunuz...</p>

			<form action="<?php echo base_url("form_process/save_form") ?>" method="post">

				<code>
					<label> İsim: </label><input type="text" name="name" value="<?php echo isset($formError) ? set_value("name") : "" ?>">
					<?php
					if (isset($formError)) { ?>
									<small><?php echo form_error("name"); ?></small>

					<?php } ?>
				</code>

				<code>
					<label> Soyisim: </label><input type="text" name="surname" value="<?php echo isset($formError) ? set_value("surname") : "" ?>">
					<?php
					if (isset($formError)) { ?>
									<small><?php echo form_error("surname"); ?></small>

					<?php } ?>
				</code>

				<code>
					<label for="uname">Kullanıcı Adı: </label>
					<input type="text" name="username" 
					value="<?php echo isset($formError) ? set_value("username") : " " ?>" 
					id="uname" >
					
					<?php
					if (isset($formError)) { ?>
									<small><?php echo form_error("username") ?></small>
					<?php }
					?>
				</code>

				<code>
					<label for="pass">Kullanıcı Şifresi: </label> <input type="password" name="pass" id="pass">
				</code>
				<code>
					<label for="pass">Kullanıcı Şifresi(tekrar): </label> <input type="password" name="passConf" id="pass">
				</code>

				<input type="submit" value="Kullanıcıyı Kaydet">
			</form>

			<?php
			echo "<hr>Kullanıcılar<pre>";
			print_r($kullanicilar);
			echo "</pre>";
			?>


			<table border="2px">
				<thead>
					<tr>
						<td>ID</td>
						<td>İsim</td>
						<td>Şifre</td>
						<td>Durum</td>
						<td>Oluşturma Tarihi</td>
					</tr>
				</thead>

				<tbody>
					<?php
					foreach ($kullanicilar as $kullanici) {
						?>
						<tr>
							<td>
								<?php echo $kullanici->id; ?>
							</td>
							<td>
								<?php echo $kullanici->user_name; ?>
							</td>
							<td>
								<?php echo $kullanici->password; ?>
							</td>
							<td>
								<?php
								echo ($kullanici->isActive == 1) ? "Aktif" : "Pasif";

								/* 	if ($kullanici->isActive == 1) {
								echo "Aktif";
								} else {
								echo "Pasif";
								} */

								?>
							</td>
							<td>
								<?php echo $kullanici->createdAt; ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>





		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
			<?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
		</p>
	</div>

</body>

</html>