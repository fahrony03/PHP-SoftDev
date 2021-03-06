<!doctype html>
<html lang="en">
<?php 
    include "koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM informasi");
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="icon" href="../img/newlogo.png">
    <link rel="stylesheet" href="style.css">

    <title>Si PEKA</title>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script> 

<?php
    include_once('navbar.php')
?>

                    <?php
                            if( ! isset($_SESSION['username'])){
                            header("location: auth/login.php");
                            }
                    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p> <?php
                    if (isset($_GET['pesan'])) {
                        # code...
                        $pesan = $_GET['pesan'];
                        if ($pesan == "berhasil") {
                    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> <?php echo $_SESSION['username']; ?> Anda berhasil login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                        }
                        }
                    ?>


            </p>
            <h1 class="display-4">Website Pertanian</h1>
            <h1 class="display-4">Si-PEKA</h1>
            <hr>
            <p class="lead">Si PEKA adalah sebuah website pertanian yang dibuat untuk mempermudah proses pemasaran
                hasil pertanian dan website ini juga menyajikan info-info menarik tentang pertanian serta tata cara
                bertani.

            </p>
        </div>
    </div>
    <div class="judul-card">
        <h1 class="display-4">Informasi</h1>
        <hr>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3">
            <?php 
                while($data = mysqli_fetch_array($query)){
            ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="../admin/menu/informasi/images/<?= $data['nama'] ?>"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['title'] ?></h5>
                    <a href="informasi/detailinfo.php?slug=<?= $data['slug'] ?>" class="btn btn-outline-success">Baca</a>
                    </div>
                </div>
            </div>
                <?php } ?>

        </div>
        </div>

        <div class="judul-card">
            <h1 class="display-4">Dokumentasi</h1>
            <hr>
        </div>

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/sawi.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/sawi.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/sawi.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="konten">
        <h4><b>VISI</b></h4>
            <p class="text-xl-left text-justify">Menjadi aplikasi pertanian yang dapat menjual produk hasil pertanian SMK PP N 1 Tegalampel Bondowoso,
            dan diharapkan dapat membantu perekonomian para petani lokal disekitar dalam memasarkan produk ke jangkauan pasar yang sangat luas</p>
        <h4><b>MISI</b></h4>
            <p class="text-xl-left text-justify">Dalam rangka mewujudkan visi yang kami terapkan, semoga dapat memasarkan produk ke jangkauan yang lebih luas,
            mendorong perekonomian dan membangun kerjasama terhadap pertanian lokal </p>
        </div>
    </div>

    <?php
        include_once('footer.php');
        ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="#"
        class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>



</body>

</html>