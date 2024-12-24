<?php

// Kelas Karyawan
class Karyawan
{
    private $nama;
    private $golongan;
    private $jamLembur;
    private $gajiPokok;
    private $totalGaji;

    // Constructor untuk inisialisasi data
    public function __construct($nama, $golongan, $jamLembur)
    {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        $this->setGajiPokok();
        $this->hitungTotalGaji();
    }

    // Method untuk set Gaji Pokok berdasarkan Golongan
    private function setGajiPokok()
    {
        $gajiGolongan = [
            "Ib" => 1250000,
            "Ic" => 1300000,
            "Id" => 1350000,
            "IIa" => 2000000,
            "IIb" => 2100000,
            "IIc" => 2200000,
            "IId" => 2300000,
            "IIIa" => 2400000,
            "IIIb" => 2500000,
            "IIIc" => 2600000,
            "IIId" => 2700000,
            "IVa" => 2800000,
            "IVb" => 2900000,
            "IVc" => 3000000,
            "IVd" => 3100000
        ];

        // Set gaji pokok berdasarkan golongan
        if (isset($gajiGolongan[$this->golongan])) {
            $this->gajiPokok = $gajiGolongan[$this->golongan];
        }
    }

    // Method untuk hitung total gaji dengan lembur
    private function hitungTotalGaji()
    {
        $gajiLembur = 15000; // Gaji per jam lembur
        $this->totalGaji = $this->gajiPokok + ($this->jamLembur * $gajiLembur);
    }

    // Getter untuk Nama
    public function getNama()
    {
        return $this->nama;
    }

    // Getter untuk Golongan
    public function getGolongan()
    {
        return $this->golongan;
    }

    // Getter untuk Total Gaji
    public function getTotalGaji()
    {
        return $this->totalGaji;
    }

    // Getter untuk Jam Lembur
    public function getJamLembur()
    {
        return $this->jamLembur;
    }

    // Destructor untuk menghapus objek
    public function __destruct()
    {
        // Destructor tidak terlalu diperlukan dalam hal ini, hanya untuk unset objek
        echo "Objek Karyawan {$this->nama} telah dihapus.\n";
    }
}

// Data karyawan
$karyawanData = [
    ["Winny", "IIb", 30],
    ["Stendy", "IIIc", 32],
    ["Alfred", "IVb", 30],
    ["Ferdinand", "IIIc", 40]
];

// Array untuk menampung objek karyawan
$karyawanArray = [];

// Membuat objek karyawan
foreach ($karyawanData as $data) {
    $karyawanArray[] = new Karyawan($data[0], $data[1], $data[2]);
}

// Menampilkan hasil
echo "Nama Karyawan | Golongan | Total Jam Lembur | Total Gaji";
echo "<br>";
echo "---------------------------------------------------------";
echo "<br>";

foreach ($karyawanArray as $karyawan) {
    echo $karyawan->getNama() . " | " . $karyawan->getGolongan() . " | " .
        $karyawan->getJamLembur() . " | Rp " . number_format($karyawan->getTotalGaji(), 0, ',', '.') . "\n";
}
