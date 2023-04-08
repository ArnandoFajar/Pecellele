<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    public function index()
    {
        $tanggal = '2023-04-05';
        $cetak_hari = false;
        $functionConvertTanggal = convertTanggal($tanggal,$cetak_hari);
        echo $functionConvertTanggal;
    }
}
