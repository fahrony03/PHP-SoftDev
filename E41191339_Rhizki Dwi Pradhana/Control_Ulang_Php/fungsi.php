<?php 
echo "Membuat Fungsi <br>";
function berhasil($ayam)
{
    echo "SELAMAT ANDA BERHASIL DENGAN NILAI : $ayam";
}
function gagal()
{
    echo "MAAF ANDA GAGAL";
}
$nilai = 80;
if ($nilai >=75)
{berhasil($nilai); }
else {gagal(); };
echo "<br>";
echo "FUNGSI DENGAN PARAMETER<br>";
function jumlah ($a,$b)
{ return $a+$b; }
$nilai1=10;
$nilai2=15;
echo jumlah($nilai1,$nilai2);
echo "<br>";
echo "FUNGSI BAWAAN<br>";
$sekarang = getdate();
print_r($sekarang);
echo "<br>";
echo "Sekarang Tanggal : ".$sekarang["mday"]." ".$sekarang["month"]." ".$sekarang["year"];
?>
