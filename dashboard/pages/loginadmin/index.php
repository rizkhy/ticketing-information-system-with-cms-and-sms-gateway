<!DOCTYPE HTML>
<html>

<head>
	<title>Login Admin Budiman</title>

	<link rel="icon" type="image/png" href="images/budimansn.png"/>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="P.O Budiman">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!--//fonts-->
</head>

<body>
    <br/>
    <div>
		<img src="images/budimansn.png" width="100" height="100" />
	</div>
	<h1 style="color: black; font-weight: bold">Masuk Admin P.O Budiman</h1>
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="cek_login.php" method="post">
			<div class="agile-field-txt">
				<label style="color: black; font-weight: bold"><i class="fa fa-user" aria-hidden="true"></i> Nama Pengguna </label>
				<input type="text" name="username" placeholder="Masukkan Nama Pengguna" required="" />
			</div>
			<div class="agile-field-txt">
				<label style="color: black; font-weight: bold"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Kata Sandi </label>
				<input type="password" name="password" placeholder="Masukkan Kata Sandi" required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3" style="color: black; font-weight: bold">Tampilkan Kata Sandi</label>
				</div>
			</div>
			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //end script -->
				<input type="submit" value="MASUK">
		</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<div class="copy-wthree">
		<p style="color: black; font-weight: bold">© 2018 P.O Budiman. All Rights Reserved.
		</p>
	</div>
	<!--//copyright-->
</body>
</html>