<?php
// Sedang melakukan pengecekan git pull

// Class induk untuk Uang Tabungan
class UangTabungan
{
    protected $saldo;  // saldo yang disimpan secara protected agar bisa diakses oleh class anak

    // Constructor untuk inisialisasi saldo awal
    public function __construct($saldoAwal)
    {
        $this->saldo = $saldoAwal;
    }

    // Method untuk menambah saldo
    public function setorTunai($jumlah)
    {
        $this->saldo += $jumlah;
    }

    // Method untuk menarik saldo
    public function tarikTunai($jumlah)
    {
        if ($this->saldo >= $jumlah) {
            $this->saldo -= $jumlah;
        } else {
            echo "Saldo tidak cukup untuk melakukan tarik tunai.\n";
        }
    }

    // Method untuk mendapatkan saldo
    public function getSaldo()
    {
        return $this->saldo;
    }
}

// Class anak untuk Siswa yang mewarisi class UangTabungan
class Siswa extends UangTabungan
{
    private $nama; // Private agar hanya bisa diakses di dalam class ini

    // Constructor untuk menginisialisasi nama dan saldo siswa
    public function __construct($nama, $saldoAwal)
    {
        parent::__construct($saldoAwal); // Memanggil constructor parent (UangTabungan)
        $this->nama = $nama;
    }

    // Method untuk menampilkan informasi saldo siswa
    public function tampilkanSaldo()
    {
        echo "Saldo awal untuk " . $this->nama . ": Rp " . number_format($this->getSaldo(), 0, ',', '.') . "\n";
    }

    // Method untuk setor tunai
    public function setor($jumlah)
    {
        $this->setorTunai($jumlah);
    }

    // Method untuk tarik tunai
    public function tarik($jumlah)
    {
        $this->tarikTunai($jumlah);
    }
}

// Membuat objek siswa dengan saldo awal
$siswa1 = new Siswa("Siswa 1", 1000000);
$siswa2 = new Siswa("Siswa 2", 1500000);
$siswa3 = new Siswa("Siswa 3", 2000000);

// Menampilkan saldo awal masing-masing siswa
$siswa1->tampilkanSaldo();
$siswa2->tampilkanSaldo();
$siswa3->tampilkanSaldo();

// Setor tunai untuk siswa1
$siswa1->setor(500000);
$siswa1->tampilkanSaldo();

// Tarik tunai untuk siswa2
$siswa2->tarik(300000);
$siswa2->tampilkanSaldo();

// Menyimpan hasil ke dalam file
$file = fopen("tabungan.txt", "w");
fwrite($file, "Tabungan Siswa:\n");
fwrite($file, "Siswa 1: Rp " . number_format($siswa1->getSaldo(), 0, ',', '.') . "\n");
fwrite($file, "Siswa 2: Rp " . number_format($siswa2->getSaldo(), 0, ',', '.') . "\n");
fwrite($file, "Siswa 3: Rp " . number_format($siswa3->getSaldo(), 0, ',', '.') . "\n");
fclose($file);

echo "Data tabungan telah disimpan.\n";
