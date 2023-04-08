<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Seeds\MinumanSeed;
use App\Models\GaleriModel;
use App\Models\MakananModel;
use App\Models\MinumanModel;
use App\Models\ReservasiModel;

class FrontendController extends BaseController
{
    public function index()
    {
        $makananModel = new MakananModel();
        $minumanModel = new MinumanModel();
        $galeriModel = new GaleriModel();

        $data = [
            'dataMakanan' => $makananModel->where('status','tersedia')->findAll(),
            'dataMinuman' => $minumanModel->where('status','tersedia')->findAll(),
            'dataGaleri' => $galeriModel->findAll()
        ];
        return view('frontend/index',$data);
    }

    //add reservasi
    public function addreservasi()
    {
        $reservasi = new ReservasiModel();

        try {
            $insert = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'telp' => $this->request->getVar('telp'),
                'tanggalbooking' => $this->request->getVar('tanggalbooking'),
                'waktubooking' => $this->request->getVar('waktubooking'),
                'jumlah' => $this->request->getVar('jumlah'),
                'pesan' => $this->request->getVar('pesan'),
            ];
            $reservasi->insert($insert);

            $insertReservasiStatus = [
                'reservasiid' => $reservasi->getInsertID(),
                'statusorder' => 'booking'
            ];
            $reservasi->db->table('reservasistatus')->insert($insertReservasiStatus);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => 'Terjadi Kesalahan server. <br/> Error :' . $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Booking Berhasil Dikirim, Kami Akan Konfirmasi Secepatnya']);
    }
}
