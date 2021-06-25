<?php
include ("koneksi.php");
  date_default_timezone_set('Asia/Jakarta');
  session_start();

  $username = $_POST['username']; 
  $password = $_POST['password'];

  // Protected Login!
  // $password1 = $_POST['password'];
  // $password = sha1($password1);

  //$username = mysqli_real_escape_string($koneksi, $username);
  //$password = mysqli_real_escape_string($koneksi, $password);

if (empty($username) && empty($password)) {
	header('location:index.php?error=Username dan Password Kosong!');
} else if (empty($username)) {
	header('location:index.php?error=Username Kosong!');
} else if (empty($password)) {
	header('location:index.php?error=Password Kosong!');
}

  $q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
  $row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['id'] = $row['id'];
	  $_SESSION['username'] = $username;
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['level']    = $row['level'];
    
if ($_SESSION['level'] == 'admin'){
      header('location:admin/tables.php');
  } else if ($_SESSION['level'] == 'user'){
      header('location:input_user.php');
  }
} else {
header('location:login.php?error=Please Check Again!');
}
?>
<!-- <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="alert alert-danger" role="alert">
        This is a danger alert—check it out!
      </div>
    </div>
  </body>
</html>
<?php
  // }
?> -->