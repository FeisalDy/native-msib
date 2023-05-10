<?php
require 'koneksi.php';

class Model
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Metode untuk mengambil data pelanggan dari tabel Pelanggan
    public function getPelanggan()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM pelanggan");
            $stmt->execute();
            $pelanggan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pelanggan;
        } catch (PDOException $e) {
            echo "Gagal mengambil data pelanggan: " . $e->getMessage();
            return [];
        }
    }

    public function getPesanan()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM pesanan");
            $stmt->execute();
            $pesanan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pesanan;
        } catch (PDOException $e) {
            echo "Gagal mengambil data pelanggan: " . $e->getMessage();
            return [];
        }
    }

    public function getKartu()
    {
        try {
            $stmt3 = $this->pdo->prepare("SELECT * FROM kartu");
            $stmt3->execute();
            $kartu = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            return $kartu;
        } catch (PDOException $e) {
            echo "Gagal mengambil data pelanggan: " . $e->getMessage();
            return [];
        }
    }

    public function inputPelanggan($kode, $nama_pelanggan, $alamat, $jk, $tmp_lahir, $tgl_lahir, $email, $kartu_id)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO pelanggan (kode, nama_pelanggan, alamat, jk, tmp_lahir, tgl_lahir, email, kartu_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$kode, $nama_pelanggan, $alamat, $jk, $tmp_lahir, $tgl_lahir, $email, $kartu_id]);
            echo "Sukses input data pelanggan";
        } catch (PDOException $e) {
            echo "Gagal input data pelanggan: " . $e->getMessage();
        }
    }

    public function inputPesanan($tanggal, $total, $pelanggan_id, $status)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO pesanan (tanggal, total, pelanggan_id, status) VALUES (?, ?, ?, ?)");
            $stmt->execute([$tanggal, $total, $pelanggan_id, $status]);
            echo "Sukses Input Pesanan";
        } catch (PDOException $e) {
            echo "Gagal input pesanan" . $e->getMessage();;
        }
    }
    public function inputKartu($kode, $nama, $diskon, $iuran)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO kartu (kode, nama, diskon, iuran) VALUES (?, ?, ?, ?)");
            $stmt->execute([$kode, $nama, $diskon, $iuran]);
            echo "Sukses Input Kartu";
        } catch (PDOException $e) {
            echo "Gagal input Kartu" . $e->getMessage();;
        }
    }

    public function updatePelanggan($id, $kode, $nama, $alamat, $jk, $tmp_lahir, $tgl_lahir, $email, $kartu_id)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE pelanggan SET kode = ?, nama_pelanggan = ?, alamat = ?, jk = ?, tmp_lahir = ?, tgl_lahir = ?, email = ?, kartu_id = ? WHERE id = ?");
            $stmt->execute([$kode, $nama, $alamat, $jk, $tmp_lahir, $tgl_lahir, $email, $kartu_id, $id]);
            echo "Sukses update data pelanggan";
        } catch (PDOException $e) {
            echo "Gagal update data pelanggan: " . $e->getMessage();
        }
    }

    public function updatePesanan($id, $tanggal, $total, $pelanggan_id, $status)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE pesanan SET tanggal = ?, total = ?, pelanggan_id = ?, status = ? WHERE id = ?");
            $stmt->execute([$tanggal, $total, $pelanggan_id, $status, $id]);
            echo "Sukses update data pesanan";
        } catch (PDOException $e) {
            echo "Gagal update data pesanan: " . $e->getMessage();
        }
    }

    public function updateKartu($id, $kode, $nama, $diskon, $iuran)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE kartu SET kode = ?, nama = ?, diskon = ?, iuran = ? WHERE id = ?");
            $stmt->execute([$kode, $nama, $diskon, $iuran, $id]);
            echo "Sukses update data kartu";
        } catch (PDOException $e) {
            echo "Gagal update data kartu: " . $e->getMessage();
        }
    }

    public function deletePelangan($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM pelanggan WHERE id = ?");
            $stmt->execute([$id]);
            echo "Sukses delete data pelanggan";
        } catch (PDOException $e) {
            echo "Gagal delete data pelanggan: " . $e->getMessage();
        }
    }

    public function deletePesanan($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM pesanan WHERE id = ?");
            $stmt->execute([$id]);
            echo "Sukses delete data pesanan";
        } catch (PDOException $e) {
            echo "Gagal delete data pesanan: " . $e->getMessage();
        }
    }

    public function deleteKartu($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM kartu WHERE id = ?");
            $stmt->execute([$id]);
            echo "Sukses delete data kartu";
        } catch (PDOException $e) {
            echo "Gagal delete data kartu: " . $e->getMessage();
        }
    }
}
