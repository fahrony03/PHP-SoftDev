<?php
	session_start();
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$querySql = mysqli_query($koneksi,"SELECT * FROM tblogin WHERE username='$username'");
	$data = mysqli_fetch_array($querySql);
	if ($username == $data['username']) {
		if ($password == $data['password']) {
			header("location:index.php?pesan=berhasil");
		} else {
			header("location:login.php?pesan=passwordsalah");
		}
	}else{
		header("location:login.php?pesan=emailsalah");
	}
?>