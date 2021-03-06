<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OnePage Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                    
                  <?php
                session_start();
                $username = 'nurico';
                $password = 'nurico';
                if (isset($_POST['submit'])) {
                    if ($_POST['username'] == $username && $_POST['password'] == $password){
                        //Membuat Session
                        $_SESSION["username"] = $username; 
                        header("Location: berhasil.php");
                        /*Jika Ingin Pindah Ke Halaman Lain*/
                        // header("Location: admin.php"); //Pindahkan Kehalaman Admin
                    } else {
                        // Tampilkan Pesan Error
                        display_login_form();
                        echo "<script>alert('Username Atau Password Anda Salah');history.go(-1);</script>";
                    }
                }    
                else { 
                    display_login_form();
                }
                function display_login_form(){ ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
                    <label for="username">username</label>
                    <br>
                    <input type="text" class="form-control" id="username" name="username">
                    <br>
                    <label for="password">password</label>
                    <br>
                    <input type="password" class="form-control" id="password" name="password">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
                    <br><br>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Submit</button>
                    </form>    
                <?php } ?>

                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                </div>
              </div>
            </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>