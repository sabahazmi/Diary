<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {

		header('location: index.php');

};
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
<section class="wrapper">
  <div class="content">
    <header>
      <h1>Write your diary</h1>
    </header>
    <section>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="login-form">
				<div class="text-danger" role="alert">
				  <?php if (@$_GET['error'] == true){  echo $_GET['error'];}?>
				</div>
				<div class="input-group">
          <!-- <label for="username">Username</label> -->
          <input type="text" placeholder="<?php date_default_timezone_set("Asia/Kolkata");
                                          echo date("l jS F Y \| h:i:s A");?>" name="date" disabled>
        </div>
        <div class="input-group">
          <!-- <label for="password">Entry</label> -->
          <textarea name="entry" rows="8" cols="90"></textarea>
        </div>
        <div class="input-group"><button type="submit" name="login">Login</button></div>
      </form>
    </section>
  </div>
</section>
</body>
</html>
