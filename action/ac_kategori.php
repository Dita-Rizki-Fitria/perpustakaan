<?php

include "koneksi.php";
$id_kategori = $_POST['id_kategori'];
$kategori = $_POST['kategori'];
if (isset($_POST['simpan'])) {


    $simpan = mysqli_query($koneksi, "INSERT INTO kategori_buku (id_kategori,kategori) VALUES ('$id_kategori','$kategori')");

    if ($simpan) {
        echo "<script>
                alert('Data berhasil ditambahkan !');
                document.location='../kategori.php';
              </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan !');
        document.location='../kategori.php';
        </script>";
    }
}
?>