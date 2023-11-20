<?php


$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$kategori_buku = $_POST['kategori_buku'];
$tahun_terbit = $_POST['tahun_terbit'];
$stok = $_POST['stok'];

include "koneksi.php";
if (isset($_POST['update'])) {

    
    $update = mysqli_query($koneksi, "UPDATE buku SET judul_buku='$judul_buku', penerbit='$penerbit', pengarang='$pengarang', kategori='$kategori_buku', tahun_terbit='$tahun_terbit', stok='$stok' WHERE  id_buku='$id_buku'");
    if ($update) {
        echo "<script>
                alert('Data berhasil dieditkan !');
                document.location='../editbuku.php';
              </script>";
    } else {
        echo "<script>
        alert('Data gagal dieditkan !');
        document.location='../editbuku.php';
        </script>";
    }
    
}
?>