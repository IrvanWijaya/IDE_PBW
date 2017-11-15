<!DOCTYPE html>
<html>
	<head>
		<title>IDE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="lib/w3.css">
		<link rel="stylesheet" href="lib/w3-theme-dark-grey.css">
		<link rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" href="lib/font-awesome.min.css">
		<link rel="stylesheet" href="lib/font-awesome.css">
	</head>
	<body style="color: white">
		<div id="bgImage"></div>
		<div class= "w3-row">
			<div class="w3-container w3-threequarter"></div>
			<div class="w3-container w3-quarter">
				<button class="w3-btn w3-light-gray w3-right w3-opacity-min btnMenuIndex">Help</button>
				<button class="w3-btn w3-light-gray w3-right w3-opacity-min btnMenuIndex">Contact us</button>
				<button class="w3-btn w3-light-gray w3-right w3-opacity-min btnMenuIndex">About us</button>
			</div>

			<div class="w3-third w3-display-left">
				<div class="w3-container ">
					<h1 class="w3-xxxlarge w3-text-white" style = "margin-left: 20px">IDE</h1>
					<p class = "w3-large w3-text-white">Interactive Digital Learning Environment</p>
					<p class= "w3-text-white w3-small">-Faculty of Information Technology and Science-</p>
					<button 
						id="btnLogin" 
						class="w3-btn w3-light-gray w3-opacity-min" 
						onclick="document.getElementById('loginModal').style.display='block'">Login</button>
				</div>
			</div>

			<div class="w3-display-bottomleft" style = "margin-left:20px">
				<p>&copy; Developed by Irvan & Nico</p>
			</div>

			<div id="loginModal" class="w3-modal " style="color:black;">
				<div class="w3-modal-content w3-display-middle modalContent">
					<a href="#" onclick="document.getElementById('loginModal').style.display='none'" 
							class="w3-button w3-display-topright modalBtnClose">&times;</a>
					<div class="w3-container">
						<h2>Login</h2>
					</div>

					<form class="w3-container formInput" method="POST" action="phpScript/login.php">
						<input class="w3-input" type="text" placeholder="Username" name="username" required value='<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>'>
						<input class="w3-input" type="password" placeholder="Password" name="password" required>
						<input type="submit" class="w3-btn w3-blue-black" value = "Login" name="submit">
					</form>
					<div id="forgetLink">
						<a href="#">Forget password</a> <span>or</span> <a href="#">Forget username?</a>
					</div>
				</div>
			</div>
		</div>		
	</body>
</html>