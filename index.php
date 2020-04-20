<?php
include 'config.php';
session_start();
if (isset($_SESSION['status'])) {
	if ($_SESSION['status'] == 'admin') {
		header('location: create.php');
  }
}
?>
<?php
	if (isset($_POST['login'])) {
		$user_id = '';
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$status   = trim($_POST['status']);
		$error ='';
		$sql = "SELECT * FROM users WHERE username = '$username' AND status = '$status'";

		$result = mysqli_query($mysqli, $sql);

		$row = mysqli_num_rows($result);
			if($row == 1)
			{
				session_start();
				// $_SESSION['user_id'] = $user_id;
				$_SESSION['username'] = $username;
				$_SESSION['status'] = $status;

				if ($status == "admin")
				{
					header('location: adminProfile.php');
				}else
				{
					header('location: userProfile.php');
				}
			}else
			{
				header('location: login.php?error= Invalid Username or Password !');
			
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
<nav class="navbar navbar-dark center bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
</nav>


<section class="wrapper">
  <div class="content">
    <header>
      <h1>Login</h1>
    </header>
    <section>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="login-form">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" placeholder="Username" id="username">
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" placeholder="Password" id="password">
        </div>
        <div class="input-group"><button type="submit" name="login">Login</button></div>
      </form>
    </section>
    <footer>
      <a href="#" title="Forgot Password">Forgot Password</a>
    </footer>
  </div>
</section>

</body>
</html>
