<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])) {

		header('location: write.php');

};
?>
<?php
	if (isset($_POST['login'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$error ='';
		$sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($mysqli, $sql);

		$row = mysqli_num_rows($result);
			if($row == 1)
			{
				// session_start();
				// $_SESSION['user_id'] = $user_id;
				$_SESSION['username'] = $username;
          header('location: write.php');
			}else
			{
				header('location: index.php?error= Invalid Username or Password !');

			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="codepen.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</head>
<body>
	<div class="navbar navbar-dark fixed-top">
	 <a class="navbar-brand text-monospace" href="#"><h3>Diary</h3></a>
	 <ul>
		 <li>Entries</li>
	 	<li>Logout</li>
	 </ul>
	</div>

	</div>
<section class="wrapper">
  <div class="content login">
    <header>
      <h1>Login</h1>
    </header>
    <section>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="login-form">
				<div class="text-danger" role="alert">
				  <?php if (@$_GET['error'] == true){  echo $_GET['error'];}?>
				</div>
				<div class="input-group">
          <!-- <label for="username">Username</label> -->
          <input type="text" placeholder="Username" name="username" id="username" autocomplete="off">
        </div>
        <div class="input-group">
          <!-- <label for="password">Password</label> -->
          <input type="password" name="password" placeholder="Password" id="password">
        </div>
        <div class="input-group"><button type="submit" name="login">Login</button></div>
      </form>
    </section>
  </div>
</section>
</body>
</html>
