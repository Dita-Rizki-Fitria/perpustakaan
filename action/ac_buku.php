<?php

include "koneksi.php";

$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$kategori_buku = $_POST['kategori_buku'];
$tahun_terbit = $_POST['tahun_terbit'];
$stok = $_POST['stok'];

if (isset($_POST['submit'])) {



    $save = mysqli_query($koneksi, "INSERT INTO buku (id_buku,judul_buku,penerbit,pengarang,kategori,tahun_terbit,stok) VALUES ('$id_buku','$judul_buku','$penerbit','$pengarang','$kategori_buku','$tahun_terbit','$stok')");

    if ($save) {
        echo "<script>
                alert('Data berhasil ditambahkan !');
                document.location='../buku.php';
              </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan !');
        document.location='../buku.php';
        </script>";
    }
}
?>