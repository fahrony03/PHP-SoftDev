<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="icon" href="../../img/newlogo.png">
    <link rel="stylesheet" href="../style.css">
    <title>Si PEKA</title>
</head>

<body class="app sidebar-mini">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <?php
        include '../koneksi.php';
    include_once('../navbarr.php');


?>
    <br><br>
    <?php
                                if(!isset($_SESSION['username'])){
                                header("location: ../menu/auth/login.php");
                                }
                    ?>

                    <?php
                        $id = $_SESSION['id']; 
                        
                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
                         
                    ?>
    <div class="container" style="background-color:white;">
        <main class="app-content">
            <div class="row user">
                <div class="col-md-12">
                    <div class="profile">
                        <div class="info"><img class="user-img" src="">
                        <?php 
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <h4><?=$data['username']?></h4>
                                <p>User (Pengguna)</p>
                                <?php
                                $id = $data['id'];
                                $nama = $data['nama'];
                                $jk = $data['jenis_kelamin'];
                                $agama = $data['agama'];                           
                                $alamat = $data['alamat'];                           
                                $email = $data['email'];
                                $hp = $data['no_hp'];
                                $lv = $data['level'];
                                ?>
                             <?php       
                            }                  
                        ?>

                        </div>
                        <div class="cover-image"></div>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="tile p-0">
                        <ul class="nav flex-column nav-tabs user-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#user-timeline"
                                    data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#user-settings"
                                    data-toggle="tab">Ganti Password</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="user-timeline">
                            <div class="timeline-post">
                                <!-- <div class="container" style="padding-top: 5%; padding-left: 1%; width: 70%;"> -->

                            <!-- Outer Row -->
                            <div class="row justify-content-center">

                            <div class="col-xl-10 col-lg-12 col-md-9 mb-5">

                                <div class="card o-hidden border-0 shadow-lg my-2">
                                <div class="card-body p-3">

                                    <div>
                                        <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-2">Selamat Datang <?= $_SESSION['username'] ?></h1>
                                        </div>
                                <div class="post-content">
                                <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?=$nama ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>: <?= $_SESSION['username'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: <?=$email ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?=$jk ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>: <?=$agama ?></td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td>: <?=$hp ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?=$alamat ?></td>
                                </tr>
                                                                <tr>
                                    <td><button class="btn-success" data-toggle="modal" data-target="#myModal">Edit</button></td>
                                </tr>
                                        
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                                
                            </div>
                            <div id="myModal" class="modal fade" role="dialog">
                            
                                <div class="modal-dialog">
                                    <!-- konten modal-->
                                    <div class="modal-content">
                                        <!-- heading modal -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Profile</h4>
                                        </div>
                                        <!-- body modal -->
                                        <div class="modal-body">
                                        <form id="postForm" action="edit.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <b>Nama</b>
                                                <input type="text" class="form-control" name="nama" value="<?= $nama ?>">
                                                <b>Username</b>
                                                <input type="text" class="form-control" name="username" value="<?= $_SESSION['username'] ?>">
                                                <b>Email</b>
                                                <input type="email" class="form-control" name="email" value="<?= $email ?>">
                                                <b>Jenis Kelamin</b>
                                                <input type="text" class="form-control" name="jk" value="<?= $jk ?>">
                                                <b>Agama</b>
                                                <input type="text" class="form-control" name="agama" value="<?= $agama ?>">
                                                <b>No Hp</b>
                                                <input type="text" class="form-control" name="hp" value="<?= $hp ?>">
                                                <b>Alamat</b>
                                                <input type="text" class="form-control" name="alamat" value="<?= $alamat ?>"><br>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>
                                        </div>
                                        <!-- footer modal -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="tab-pane fade" id="user-settings">
                        <div class="container">

                            <!-- Outer Row -->
                            <div class="row justify-content-center">

                            <div class="col-xl-10 col-lg-12 col-md-9">

                                <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                        <img class="col-lg-12 d-none d-lg-block bg-login-image" style="padding-top: 6%;" src="../img/petanikotak.jpg" alt="">
                                    </div> -->
                                    <div class="col-lg-30">
                                        <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-2">Ganti Password</h1>
                                            <p class="mb-4">Konfirmasi Email Anda Untuk Melakukan Perubahan Password!</p>
                                        </div>

                                        <?php
                                            error_reporting(0);
                                            include("../config.php");
                                            if(isset($_POST['submit'])) {
                                                $_SESSION['submit']='';
                                            }

                                            if(isset($_POST['change']))
                                            {
                                            $email=$_POST['email'];
                                            $password=$_POST['password'];
                                            $query=mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
                                            $num=mysqli_fetch_array($query);
                                            if($num>0)
                                            {
                                                mysqli_query($con,"update user set password='$password' WHERE email='$email'");
                                                $msg="Password Changed Successfully";
                                            }
                                            else
                                            {
                                                $msg="Invalid email";
                                            }
                                            }
                                            ?>

                                                <section class="material-half-bg">
                                                <div class="cover">
                                                </div>
                                                
                                                </section>
                                                <section class="login-content">
                                                <div class="login-box">
                                                <p style="padding-left:20%; color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></p>
                                                
                                                <p style="padding-left:20%; color:green">
                                                    <?php if($msg){
                                                    echo htmlentities($msg);
                                                    }?></p>
                                                    
                                                    <form class="login-form" name="forgot" method="post">
                                                <div class="form-group">
                                                <input class="form-control" type="email" aria-describedby="emailHelp" name="email" placeholder="email" required="" autofocus>
                                                </div>
                                                <div class="form-group">
                                                <input class="form-control" type="password" placeholder="New Password" id="password" name="password">
                                                </div>
                                                <div class="form-group">
                                                <input class="form-control" type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword">
                                                </div>
                                                <div class="form-group btn-container">
                                                <button type="submit" name="change" onclick="return valid();" class="btn btn-user btn-success btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Reset Password</button>
                                                </div>
                                                <a href="login.php" class="btn btn-google btn-danger btn-block">
                                            <i class="fab fa-google fa-fw"></i> Back
                                            </a>
                                            </form>
                                            </div>
                                        </section>

                                                            <!-- Essential javascripts for application to work-->
                                                            <script src="login/js/jquery-3.2.1.min.js"></script>
                                                            <script src="login/js/popper.min.js"></script>
                                                            <script src="login/js/bootstrap.min.js"></script>
                                                            <script src="login/js/main.js"></script>
                                                            <!-- The javascript plugin to display page loading on top-->
                                                            <script src="login/js/plugins/pace.min.js"></script>
                                                            <hr>
                                                            <div class="text-center">
                                                                <a class="small" href="register.php">Create an
                                                                    Account!</a>
                                                            </div>
                                                            <div class="text-center">
                                                                <a class="small" href="login.php">Already have an
                                                                    account? Login!</a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
    <br><br>
    <?php
        include_once('../footerr.php');
        ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="#" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>



</body>

</html>