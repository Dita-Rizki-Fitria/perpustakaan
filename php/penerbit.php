<?php

// Sertakan file konfigurasi database
include 'config/db.php';

// Operasi CRUD
class PenerbitCRUD
{
    private $conn;

    public function __construct()
    {

        // Membuat instance baru dari koneksi database
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Periksa koneksinya
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createDatabase()
    {

        // Membuat atau memilih database
        $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
        if ($this->conn->query($sqlCreateDatabase) === TRUE) {
            echo "Database created or already exists.\n";
        } else {
            die("Error creating database: " . $this->conn->error . "\n");
        }

        // Pilih basis data
        $this->conn->select_db(DB_NAME);
    }

    public function createTable()
    {

        // Periksa apakah tabel 'penerbit' ada
        $tableCheckQuery = "SHOW TABLES LIKE 'penerbit'";
        $tableCheckResult = $this->conn->query($tableCheckQuery);

        if ($tableCheckResult->num_rows == 0) {

            // Tabel 'penerbit' tidak ada, buatlah tabelnya
            $sqlCreateTable = "
                CREATE TABLE penerbit (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nama VARCHAR(255) NOT NULL,
                    alamat VARCHAR(255),
                    no_telp VARCHAR(20)
                )
            ";

            if ($this->conn->query($sqlCreateTable) === TRUE) {
                echo "Table 'penerbit' created successfully.\n";
            } else {
                die("Error creating table 'penerbit': " . $this->conn->error . "\n");
            }
        } else {
            echo "Table 'penerbit' already exists.\n";
        }
    }

    public function createPenerbit($nama, $alamat, $no_telp)
    {

        // Memasukkan record baru ke dalam tabel penerbit
        $query = "INSERT INTO penerbit (nama, alamat, no_telp) VALUES ('$nama', '$alamat', '$no_telp')";
        $result = $this->conn->query($query);

        return $result;
    }

    public function getPenerbitList()
    {

        // Mengambil daftar penerbit dari database
        $query = "SELECT * FROM penerbit";
        $result = $this->conn->query($query);
        $penerbitList = array();

        // Ambil hasilnya sebagai array asosiatif
        while ($row = $result->fetch_assoc()) {
            $penerbitList[] = $row;
        }

        return $penerbitList;
    }

    public function getPenerbitById($id)
    {
        // Ambil rekaman penerbit tertentu berdasarkan ID
        $query = "SELECT * FROM penerbit WHERE id = $id";
        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    public function updatePenerbit($id, $nama, $alamat, $no_telp)
    {
        // Perbarui catatan penerbit di database
        $query = "UPDATE penerbit SET nama='$nama', alamat='$alamat', no_telp='$no_telp' WHERE id=$id";
        $result = $this->conn->query($query);

        return $result;
    }

    public function deletePenerbit($id)
    {

        // Hapus catatan penerbit dari database
        $query = "DELETE FROM penerbit WHERE id=$id";
        $result = $this->conn->query($query);

        return $result;
    }

    public function __destruct()
    {

        // Menutup koneksi database saat objek dimusnahkan
        $this->conn->close();
    }
}

// Contoh penggunaan
$penerbitCRUD = new PenerbitCRUD();

// Periksa apakah formulir sudah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_id'])) {

        // Ekstrak data formulir
        $deleteId = $_POST['delete_id'];

        // Panggil metode deletePenerbit
        $deleteResult = $penerbitCRUD->deletePenerbit($deleteId);

        // Tangani hasilnya sesuai kebutuhan
        if ($deleteResult) {
            echo "Penerbit deleted successfully!";
        } else {
            echo "Error deleting Penerbit: " . $penerbitCRUD->$conn->error;
        }

        // Redirect ke halaman penerbit.html setelah memproses formulir
        header("Location: ../penerbit.php");
        exit();
    }

    // Periksa apakah data formulir untuk pembaruan sudah diatur
    if (isset($_POST['update_id']) && isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_telp'])) {

        // Ekstrak data formulir
        $updateId = $_POST['update_id'];
        $newNama = $_POST['nama'];
        $newAlamat = $_POST['alamat'];
        $newNoTelp = $_POST['no_telp'];

        // Panggil metode updatePenerbit
        $updateResult = $penerbitCRUD->updatePenerbit($updateId, $newNama, $newAlamat, $newNoTelp);

        // Tangani hasilnya sesuai kebutuhan
        if ($updateResult) {
            echo "Penerbit updated successfully!";
        } else {
            echo "Error updating Penerbit: " . $penerbitCRUD->$conn->error;
        }

        // Redirect ke halaman penerbit.html setelah memproses formulir
        header("Location: ../penerbit.php");
        exit();
    }

    // Periksa apakah data formulir sudah disetel
    if (isset($_POST['nama'])) {

        // Panggil metode createDatabase
        $penerbitCRUD->createDatabase();

        // Memanggil metode createTable
        $penerbitCRUD->createTable();

        // Ekstrak data formulir
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];

        // Memanggil metode createPenerbit
        $result = $penerbitCRUD->createPenerbit($nama, $alamat, $no_telp);

        // Tangani hasilnya sesuai kebutuhan
        if ($result) {
            echo "Penerbit created successfully!";
        } else {
            echo "Error creating Penerbit: " . $penerbitCRUD->$conn->error;
        }

        // Redirect ke halaman penerbit.html setelah memproses formulir
        header("Location: ../penerbit.php");
        exit();
    }
}
