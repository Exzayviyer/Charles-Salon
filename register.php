<?php
include 'repository/user.php';
include 'shared/header.php';
?>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);



.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(header-bg.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(10%,rgba(0,0,0,0.65)), color-stop(100%,rgba(1,1,1,1))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login button{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=email]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=address]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=radio]{
	width: 	20px;
	height: 20px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	padding: 4px;
	margin-right: 5px;
	margin-left: 5px;
}

.login select{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login option{
	background: rgb(0,0,0,0.65);
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login button:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login button:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

.login button:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body id="page-top">

	<?php
	//Navigation
	include 'shared/nav.php';
	?>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Reg<span>ister</span></div>
		</div>
		<br>
		<div class="login">

			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$user = [
					'email' => $_POST["email"],
					'password' => $_POST["password"],
					'cpassword' => $_POST["cpassword"],
					'fname' => $_POST["fname"],
					'lname' => $_POST["lname"],
					'gender' => $_POST["gender"]
				];

				$bool = true;

				if (checkuser($user)) {
					?>
					<p style="color: red;">An account already exists with this email address.</p>
					<?php
					$bool = false;
				}

				if ($user['password'] != $_POST["cpassword"]) {
					?>
					<p style="color: red;">Password did now match.</p>
					<?php
					$bool = false;
				}

				if ($bool) {
					register($user);
					?>
					<p>Account successfully registered. <a href = "login.php">Login</a></p>
					<?php
				}
			}
			?>

			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<input type="email" placeholder="Email" name="email" required value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo($_POST["email"]); } ?>"><br><br>
				<input type="password" placeholder="Password" name="password" required><br><br>
				<input type="password" placeholder="Confirm Password" name="cpassword" required><br><br>
                <input type="text" placeholder="First Name" name="fname" required value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo($_POST["fname"]); } ?>"><br><br>
                <input type="text" placeholder="Last Name" name="lname" required value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo($_POST["lname"]); } ?>"><br><br>
                <lavel>Gender:</lavel>
                <input type="radio" name="gender" value="Male" required><lavel>Male</lavel>
                <input type="radio" name="gender" value="Female" required><lavel>Female</lavel>

                <br><br>
				
				<button value="submit">Register</button><br><br>
               <p>Already have an account? <a href = "login.php">Login</a></p>
            </form>
		</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>