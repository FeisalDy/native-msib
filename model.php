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
}
