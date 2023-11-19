<?php
// ambil nim dari url variable
$id_kategori = $_REQUEST['id_kategori'];
// koneksi
include "action/koneksi.php";
// jalankan query delete dengan condition nim=nimnya
$hapus = mysqli_query($koneksi, "DELETE FROM kategori_buku WHERE id_kategori='$id_kategori'");
// kembalikan ke halaman data.php
if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapuskan !');
            document.location='kategori.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal dihapuskan !');
    document.location='kategori.php';
    </script>";
}
?>

