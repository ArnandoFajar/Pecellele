<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;
use Exception;
use Hermawan\DataTables\DataTable;

class ReservasiController extends BaseController
{
    //CRUD Menu Minuman
    //Get all Menu Minuman
    public function getreservasi()
    {
        $reservasi = new ReservasiModel();
        $jenisReservasi = $this->request->getVar('statusreservasi');        

        switch ($jenisReservasi) {
            case 'terlaksana':
                $builder = $reservasi->select('id,nama, tanggalbooking, telp, statusorder')->join('reservasistatus', 'reservasistatus.reservasiid=reservasi.id')->where('statusorder', 'terlaksana')->orderBy('id', 'DESC');
                break;

            case 'batal':
                $builder = $reservasi->select('id,nama, tanggalbooking, telp, statusorder')->join('reservasistatus', 'reservasistatus.reservasiid=reservasi.id')->where('statusorder', 'batal')->orderBy('id', 'DESC');
                break;

            case 'booking':
                $builder = $reservasi->select('id,nama, tanggalbooking, telp, statusorder')->join('reservasistatus', 'reservasistatus.reservasiid=reservasi.id')->where('statusorder', 'booking')->orderBy('id', 'DESC');
                break;

            default:
                $builder = $reservasi->select('id,nama, tanggalbooking, telp, statusorder')->join('reservasistatus', 'reservasistatus.reservasiid=reservasi.id')->orderBy('id', 'DESC');
                break;
        }

        return DataTable::of($builder)->addNumbering()
        ->add('Aksi', function ($row) {
            return '
        <button class="btn btn-sm btn-info import" onclick="editReservasiFunc(' . $row->id . ')"><i class="fa fa-edit"></i></button>
        <button class="btn btn-sm btn-danger import" onclick="deleteReservasiFunc(' . $row->id . ')"><i class="fa fa-trash"></i></button>
        <button class="btn btn-sm btn-danger import" onclick="viewReservasiFunc(' . $row->id . ')"><i class="fa fa-eye"></i></button>
        ';
        })
        ->hide('id')
        ->hide('gambar')
        ->toJson();
    }

    //get reservas by id
    public function getreservasibyid()
    {
        $reservasi = new ReservasiModel();
        $id = $this->request->getVar('id');

        try {
            $data = $reservasi->join('reservasistatus', 'reservasistatus.reservasiid = reservasi.id')->where('id', $id)->first();
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
        return json_encode($data);
    }

    // update reservasi
    public function updatereservasi()
    {
        $reservasi = new ReservasiModel();
        $id = $this->request->getVar('id');
        try {
            $update = [
                'statusorder' => $this->request->getVar('statusorder'),
            ];
            $reservasi->db->table('reservasistatus')->update($update, ['reservasiid' => $id]);
            $totalBooking = $reservasi->join('reservasistatus', 'reservasistatus.reservasiid=reservasi.id')->where('statusorder', 'booking')->countAllResults();
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage(), 'totalBookingSidebar' => $totalBooking]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Diupdate', 'totalBookingSidebar' => $totalBooking]);
    }

    //delete minuman
    public function deletereservasi()
    {
        $reservasi = new ReservasiModel();
        $id = $this->request->getVar('id');
        try {
            $data = $reservasi->find($id);
            $reservasi->delete($id);
            $totalBooking = $reservasi->join('reservasistatus', 'reservasistatus.reservasiid=reservasi.id')->where('statusorder', 'booking')->countAllResults();
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage(), 'totalBookingSidebar' => $totalBooking]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Selesai Dihapus', 'totalBookingSidebar' => $totalBooking]);
    }
}
