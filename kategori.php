<!DOCTYPE html>
<html>

<head>
    <title>Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
</head>
<form action="action/ac_kategori.php" method="POST" enctype="multipart/form-data">
<body>
    <input type="checkbox" id="checkbox" />
    <div id="top"></div>
    <div class="body">
        <div class="nav_kiri" id="kiri"></div>
        <div class="text-dark p-4 col-4">
            <ins>
                <h3><strong>Kategori</strong></h3>
            </ins>
            <div class="conten">
                <div class="text-dark p-6 ">
                    <strong>
                              <p>Kategori Baru</p>
                          </strong>
                    <div class="rounded-pill alert alert-secondary ">
                        <div class="form-group text-dark   ">
                            <label for="" class="control-label">Kategori</label>
                            <input type="text" class="form-control form-control-sm" name="kategori" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn" name="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
</form>

        <div class="table-responsive">
            <div class="text-dark col p-6">
                <br><br>
                <div class="text-dark p-4 ">
                    <strong>
                    <p>Data Kategori</p>
                </strong>
                    <table class="table table-bordered text-dark h-10">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                <?php
                  $no = 1;  
                  include "action/koneksi.php";
                  $data = mysqli_query($koneksi, "SELECT * FROM kategori_buku");

                  while ($row = mysqli_fetch_array($data)) {    
                  ?>
                  <tbody>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['kategori'] ?></td>
                        <td>
                            <a href="editkategori.php?id_kategori=<?php echo $row['id_kategori'] ?>" class="" name="edit">
                                <span id="boot-icon" class="bi bi-pencil-fill" style="font-size: 1rem; color: rgb(0, 0, 0);"></span>
                            </a>
                            <a href="hapuskategori.php?id_kategori=<?php echo $row['id_kategori'] ?>" type="button" class="bi bi-trash-fill" data-toggle="modal" data-target="#exampleModalCenter" style="font-size: 1rem; color: rgb(255, 0, 0);" name="hapus">
                            </a>
                        </td> 
                    </tr>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-dark">
                                        <em>
                                            <h5 class="modal-title" id="exampleModalLongTitle">Buku</h5>
                                        </em>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <strong>Apakah anda ingin menghapus data ini ?<strong>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="kategori.php" class="btn btn-secondary">Tidak</a>
                                        <a href="hapuskategori.php?id_kategori=<?php echo $row['id_kategori'] ?>"    class="btn btn-primary">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>      
                </tbody>
                </table>
            </div>
    </div>
</div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
                integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous"></script>
                <script src="asset/js/lock_header.js"></script>
                <script src="asset/js/lock_navbar.js"></script>
</body>

</html>