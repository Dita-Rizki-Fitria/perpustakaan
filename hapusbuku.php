<?php
// ambil nim dari url variable
$id_buku = $_REQUEST['id_buku'];
// koneksi
include "action/koneksi.php";
// jalankan query delete dengan condition nim=nimnya
$hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id_buku'");
// kembalikan ke halaman data.php
if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapuskan !');
            document.location='buku.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal dihapuskan !');
    document.location='buku.php';
    </script>";
}
?>

