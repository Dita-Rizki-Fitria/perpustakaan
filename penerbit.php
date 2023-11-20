<!-- menginisialisasi variabel -->
<?php
include 'php/penerbit.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>

<body>
    <input type="checkbox" id="checkbox" />
    <div id="top"></div>
    <div class="body">
        <div class="nav_kiri" id="kiri"></div>
        <div class="text-dark p-4 col-4">
            <ins>
                <h3><strong>Penerbit</strong></h3>
            </ins>
            <div class="conten">
                <div class="text-dark p-5 ">
                    <strong>
                        <p>Penerbit Baru</p>
                    </strong>
                    <div class="rounded-pill p-2 alert alert-secondary ">
                        <form action="php/penerbit.php" method="post">
                            <div class="form-group text-dark   ">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group  text-dark">
                                <label for="" class="control-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group  text-dark">
                                <label for="" class="control-label">No Handphone</label>
                                <input type="text" name="no_telp" class="form-control form-control-sm" required>
                            </div>
                            <!-- Tombol yang memicu modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSaya">
                                Simpan
                            </button>

                            <!-- Contoh Modal -->
                            <div class="modal fade" id="modalSaya" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <em>
                                                <h5 class="modal-title" id="modalSayaLabel">Penerbit Baru</h5>
                                            </em>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Apakah Anda yakin untuk menyimpan data ini ?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-dark col p-2">
            <br><br><br>
            <div class="text-dark p-4 ">
                <strong>
                    <p>Data Penerbit</p>
                </strong>
                <table class="table table-bordered text-dark h-50 table table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Handphone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $penerbitCRUD = new PenerbitCRUD();

                        $penerbitList = $penerbitCRUD->getPenerbitList();

                        foreach ($penerbitList as $index => $penerbit) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $index + 1; ?>
                                </th>
                                <td>
                                    <?php echo $penerbit['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $penerbit['alamat']; ?>
                                </td>
                                <td>
                                    <?php echo $penerbit['no_telp']; ?>
                                </td>
                                <td>
                                    <a href="edit_penerbit.php?id=<?php echo $penerbit['id']; ?>" class="">
                                        <span id="boot-icon" class="bi bi-pencil-fill" style="font-size: 1rem; color: rgb(0, 0, 0);"></span>
                                    </a>
                                    <a href="#" class="bi bi-trash-fill" data-toggle="modal" data-target="#deleteModal<?php echo $penerbit['id']; ?>" style="font-size: 1rem; color: rgb(255, 0, 0);"></a>

                                    <!-- Hapus Modal Konfirmasi -->
                                    <div class="modal fade" id="deleteModal<?php echo $penerbit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-dark">
                                                    <em>
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Penerbit</h5>
                                                    </em>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    <strong>Apakah anda ingin menghapus data ini ?<strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    <form action="php/penerbit.php" method="post">
                                                        <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $penerbit['id'] ?>">
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="asset/js/lock_header.js"></script>
                <script src="asset/js/lock_navbar.js"></script>

</body>

</html>