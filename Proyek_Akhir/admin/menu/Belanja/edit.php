<?php
require "koneksi.php";

// insert one row
$nama_file = $_FILES['gb']['name'];
$ukuran_file = $_FILES['gb']['size'];
$tipe_file = $_FILES['gb']['type'];
$tmp_file = $_FILES['gb']['tmp_name'];
$id = $_POST['id'];
$galam = $_POST['gl'];
$ukuran = $_POST['ukuran'];
$tipe = $_POST['tipe'];
$title = $_POST['title'];
$slug = $_POST['title'];
$content = $_POST['content'];
$harga = $_POST['harga'];
$berat = $_POST['berat'];
$stok = $_POST['stok'];


    // Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;

if ($nama_file != "") {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
          // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
          // Proses upload
          if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
            $stmt = $pdo->prepare("UPDATE belanja SET nama=:nama, slug=:slug, ukuran=:ukuran,tipe=:tipe,title=:title,content=:content, harga=:harga, berat=:berat, stok=:stok WHERE id =:id" );
            $stmt->bindParam(':nama',$nama_file);
            $stmt->bindParam(':slug',$slug);
            $stmt->bindParam(':ukuran',$ukuran_file);
            $stmt->bindParam(':tipe',$tipe_file);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':harga', $harga);
            $stmt->bindParam(':berat', $berat);
            $stmt->bindParam(':stok', $stok);
            $stmt->bindParam(':id', $id);
            // 
            if($stmt->execute()){
                $link = unlink("images/".$galam);
                header("Location:index.php");
            }else{
              // Jika Gagal, Lakukan :
              echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
              echo "<br><a href='form.php'>Kembali Ke Form</a>";
            }
          }else{
            // Jika gambar gagal diupload, Lakukan :
            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href='form.php'>Kembali Ke Form</a>";
          }
        }else{
          // Jika ukuran file lebih dari 1MB, lakukan :
          echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
          echo "<br><a href='form.php'>Kembali Ke Form</a>";
        }
      }else{
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
        echo "<br><a href='form.php'>Kembali Ke Form</a>";
      }
}else{
    $stmt = $pdo->prepare("UPDATE belanja SET slug=:slug,title=:title,content=:content, harga=:harga, berat=:berat, stok=:stok WHERE id =:id");
    $stmt->bindParam(':slug',$slug);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':berat', $berat);
    $stmt->bindParam(':stok', $stok);
    $stmt->bindParam(':id', $id);
    if($stmt->execute())
    
  header("Location:index.php"); 
}
?>