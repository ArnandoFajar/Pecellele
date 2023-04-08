<?php

namespace CodeIgniter;

use App\Controllers\ReservasiController;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class testReservasiController extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;


    public function testGetReservasi()
    {
        $result = $this->withURI(base_url('admin/reservasi'))
            ->controller(ReservasiController::class)
            ->execute('getreservasi');

        var_dump($result->getJSON());

        $this->assertTrue($result->isOK());
    }
}
