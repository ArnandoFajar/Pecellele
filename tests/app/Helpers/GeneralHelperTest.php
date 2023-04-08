<?php

namespace App\Helpers;

use CodeIgniter\Test\CIUnitTestCase;

class GeneralHelperTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp(); 
        helper('general_helper');
    }
    public function testConvertTanggal()
    {
        $tanggal = '2023-04-05';
        $cetak_hari = false;
        $functionConvertTanggal = convertTanggal($tanggal,$cetak_hari);
        $this->assertSame('05 April 2023',$functionConvertTanggal);
    }

    public function testConvertBulan()
    {
        $bulan = 1;
        $fungsiConvertBulan = convertBulan($bulan);
        $this->assertSame('Januari', $fungsiConvertBulan);
    }

    public function testRupiah()
    {
        $angka = 5000000;
        $fungsiRupiah = rupiah($angka);
        $this->assertSame('Rp 5.000.000', $fungsiRupiah);
    }

    public function testPenjumlahanTanggal()
    {
        $tanggalAwal = '2022-03-22';
        $tanggalJumlah = '100'; //100 hari
        $fungsiPenjumlahanTanggal = penjumlahanTanggal($tanggalAwal,$tanggalJumlah);
        $this->assertSame('2022-06-30', $fungsiPenjumlahanTanggal);
    }

    public function testSelisihTanggal()
    {
        $tanggalAwal = '2023-01-22';
        $tanggalAkhir = '2024-05-22';
        $fungsiSelisihTanggal = selisihTanggal($tanggalAwal,$tanggalAkhir);
        $this->assertSame(486,$fungsiSelisihTanggal);
    
    }
}