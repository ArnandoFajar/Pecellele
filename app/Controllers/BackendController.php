<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\MakananModel;
use App\Models\MinumanModel;
use App\Models\ReservasiModel;
use Hermawan\DataTables\DataTable;

class BackendController extends BaseController
{
    // View
    public function dashboard()
    {
        $GaleriModel = new GaleriModel();
        $MakananModel = new MakananModel();
        $MinumanModel = new MinumanModel();
        $ReservasiModel = new ReservasiModel();

        $totalBooking = $ReservasiModel->join('reservasistatus','reservasistatus.reservasiid=reservasi.id')->where('statusorder','booking')->countAllResults();

        $totalMinuman = $MinumanModel->countAllResults();
        $totalMakanan = $MakananModel->countAllResults();
        $totalGaleri = $GaleriModel->countAllResults(); 

        $data = [
            'title' => "dashboard",
            'totalBooking' => $totalBooking,
            'totalGaleri' => $totalGaleri,
            'totalMakanan' => $totalMakanan,
            'totalMinuman' => $totalMinuman,
            'totalBookingSidebar' => ($totalBooking > 0) ? $totalBooking : false
        ];
        return view('backend/dashboard', $data);
    }

    public function menu()
    {
        $ReservasiModel = new ReservasiModel();

        $totalBooking = $ReservasiModel->join('reservasistatus','reservasistatus.reservasiid=reservasi.id')->where('statusorder','booking')->countAllResults();
        $data = [
            'title' => "menu",
            'totalBookingSidebar' => ($totalBooking > 0) ? $totalBooking : false
        ];
        return view('backend/menu', $data);
    }

    public function galeri()
    {
        $ReservasiModel = new ReservasiModel();

        $totalBooking = $ReservasiModel->join('reservasistatus','reservasistatus.reservasiid=reservasi.id')->where('statusorder','booking')->countAllResults();
        $data = [
            'title' => "galeri",
            'totalBookingSidebar' => ($totalBooking > 0) ? $totalBooking : false
        ];
        return view('backend/galeri', $data);
    }

    public function reservasi()
    {
        $ReservasiModel = new ReservasiModel();

        $totalBooking = $ReservasiModel->join('reservasistatus','reservasistatus.reservasiid=reservasi.id')->where('statusorder','booking')->countAllResults();
        $data = [
            'title' => "reservasi",
            'totalBookingSidebar' => ($totalBooking > 0) ? $totalBooking : false
        ];
        return view('backend/reservasi', $data);
    }
    //end view

    //CRUD Menu Makanan 
    //get all menu Makanan
    public function getmakanan()
    {
        $makanan = new MakananModel();

        //can use query builder or model
        // $builder = $db->table('customers')->select('customerNumber, customerName, phone, city, country, postalCode');
        $builder = $makanan->select('id,nama, keterangan, harga, status, gambar')->orderBy('id', 'DESC');

        return DataTable::of($builder)->addNumbering()
            ->add('Gambar', function ($row) {
                return "<img src='" . base_url('assets/upload/' . $row->gambar . '') . "' class='img-thumbnail' alt=''>";
            })
            ->add('Aksi', function ($row) {
                return '
            <button class="btn btn-sm btn-info import" onclick="editMakananFunc(' . $row->id . ')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger import" onclick="deleteMakananFunc(' . $row->id . ')"><i class="fa fa-trash"></i></button>
            ';
            })
            ->hide('id')
            ->hide('gambar')
            ->toJson();
    }

    //add makanan
    public function addmakanan()
    {
        $makanan = new MakananModel();
        $file = $this->request->getFile('gambar');
        $fileName = $file->getFilename();

        if ($fileName != '') {
            $fileName = $file->getRandomName();
            $file->move('assets/upload', $fileName);
        } else {
            $fileName = "contoh.jpg";
        }

        try {
            $update = [
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'harga' => $this->request->getVar('harga'),
                'status' => $this->request->getVar('status'),
                'gambar' => $fileName
            ];
            $makanan->insert($update);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Ditambah']);
    }

    //get makanan by id
    public function getmakananbyid()
    {
        $makanan = new MakananModel();
        $id = $this->request->getVar('id');

        try {
            $data = $makanan->find($id);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
        return json_encode($data);
    }

    public function updatemakanan()
    {
        $makanan = new MakananModel();
        $id = $this->request->getVar('id');
        $file = $this->request->getFile('gambar');
        $fileName = $file->getFilename();

        if ($fileName != '') {
            $fileName = $file->getRandomName();
            $file->move('assets/upload', $fileName);
            if ($this->request->getVar('gambar_old') != '') {
                if (file_exists('assets/upload/' . $this->request->getVar('gambar_old')))
                    unlink('assets/upload/' . $this->request->getVar('gambar_old'));
            }
        } else {
            $fileName = $this->request->getVar('gambar_old');
        }

        try {
            $update = [
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'harga' => $this->request->getVar('harga'),
                'status' => $this->request->getVar('status'),
                'gambar' => $fileName
            ];
            $makanan->update($id, $update);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Diupdate']);
    }

    //delete makanan
    public function deletemakanan()
    {
        $makanan = new MakananModel();
        $id = $this->request->getVar('id');

        try {
            $data = $makanan->find($id);
            $makanan->delete($id);
            if ($data['gambar'] != 'contoh.jpg') {
                if (file_exists('assets/upload/' . $data['gambar'])) {
                    unlink('assets/upload/' . $data['gambar']);
                }
            }
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Selesai Dihapus']);
    }

    //CRUD Menu Minuman
    //Get all Menu Minuman
    public function getminuman()
    {
        $minuman = new MinumanModel();

        //can use query builder or model
        // $builder = $db->table('customers')->select('customerNumber, customerName, phone, city, country, postalCode');
        $builder = $minuman->select('id,nama, keterangan, harga, status, gambar')->orderBy('id', 'DESC');

        return DataTable::of($builder)->addNumbering()
            ->add('Gambar', function ($row) {
                return "<img src='" . base_url('assets/upload/' . $row->gambar . '') . "' class='img-thumbnail' alt=''>";
            })
            ->add('Aksi', function ($row) {
                return '
            <button class="btn btn-sm btn-info import" onclick="editMinumanFunc(' . $row->id . ')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger import" onclick="deleteMinumanFunc(' . $row->id . ')"><i class="fa fa-trash"></i></button>
            ';
            })
            ->hide('id')
            ->hide('gambar')
            ->toJson();
    }

    //add minuman
    public function addminuman()
    {
        $minuman = new MinumanModel();
        $file = $this->request->getFile('gambar');
        $fileName = $file->getFilename();

        if ($fileName != '') {
            $fileName = $file->getRandomName();
            $file->move('assets/upload', $fileName);
        } else {
            $fileName = "contoh.jpg";
        }

        try {
            $insert = [
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'harga' => $this->request->getVar('harga'),
                'status' => $this->request->getVar('status'),
                'gambar' => $fileName
            ];
            $minuman->insert($insert);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Ditambah']);
    }

    //get minuman by id
    public function getminumanbyid()
    {
        $minuman = new MinumanModel();
        $id = $this->request->getVar('id');

        try {
            $data = $minuman->find($id);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
        return json_encode($data);
    }

    // update minuman
    public function updateminuman()
    {
        $minuman = new MinumanModel();
        $id = $this->request->getVar('id');
        $file = $this->request->getFile('gambar');
        $fileName = $file->getFilename();

        if ($fileName != '') {
            $fileName = $file->getRandomName();
            $file->move('assets/upload', $fileName);
            if ($this->request->getVar('gambar_old') != '') {
                if (file_exists('assets/upload/' . $this->request->getVar('gambar_old')))
                    unlink('assets/upload/' . $this->request->getVar('gambar_old'));
            }
        } else {
            $fileName = $this->request->getVar('gambar_old');
        }

        try {
            $update = [
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'harga' => $this->request->getVar('harga'),
                'status' => $this->request->getVar('status'),
                'gambar' => $fileName
            ];
            $minuman->update($id, $update);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Diupdate']);
    }

    //delete minuman
    public function deleteminuman()
    {
        $minuman = new MinumanModel();
        $id = $this->request->getVar('id');
        try {
            $data = $minuman->find($id);
            $minuman->delete($id);
            if ($data['gambar'] != 'contoh.jpg') {
                if (file_exists('assets/upload/' . $data['gambar'])) {
                    unlink('assets/upload/' . $data['gambar']);
                }
            }
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Selesai Dihapus']);
    }


    //CRUD galeri
    //Get all galeri
    public function getgaleri()
    {
        $galeri = new GaleriModel();

        
        //can use query builder or model
        // $builder = $db->table('customers')->select('customerNumber, customerName, phone, city, country, postalCode');
        $builder = $galeri->select('id,gambar')->orderBy('id', 'DESC');

        return DataTable::of($builder)->addNumbering()
            ->add('Gambar', function ($row) {
                return "<img src='" . base_url('assets/upload/' . $row->gambar . '') . "' class='img-thumbnail w-25' alt=''>";
            })
            ->add('Aksi', function ($row) {
                return '
            <button class="btn btn-sm btn-info import" onclick="editGaleriFunc(' . $row->id . ')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger import" onclick="deleteGaleriFunc(' . $row->id . ')"><i class="fa fa-trash"></i></button>
            ';
            })
            ->hide('id')
            ->hide('gambar')
            ->toJson();
    }

    //add galeri
    public function addgaleri()
    {
        $galeri = new GaleriModel();
        $file = $this->request->getFile('gambar');
        $fileName = $file->getFilename();

        if ($fileName != '') {
            $fileName = $file->getRandomName();
            $file->move('assets/upload', $fileName);
        } else {
            $fileName = "contoh.jpg";
        }

        try {
            $insert = [
                'gambar' => $fileName
            ];
            $galeri->insert($insert);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Ditambah']);
    }

    //get galeri by id
    public function getgaleribyid()
    {
        $galeri = new GaleriModel();
        $id = $this->request->getVar('id');

        try {
            $data = $galeri->find($id);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
        return json_encode($data);
    }

    // update galeri
    public function updategaleri()
    {
        $galeri = new GaleriModel();
        $id = $this->request->getVar('id');
        $file = $this->request->getFile('gambar');
        $fileName = $file->getFilename();

        if ($fileName != '') {
            $fileName = $file->getRandomName();
            $file->move('assets/upload', $fileName);
            if ($this->request->getVar('gambar_old') != '') {
                if (file_exists('assets/upload/' . $this->request->getVar('gambar_old')))
                    unlink('assets/upload/' . $this->request->getVar('gambar_old'));
            }
        } else {
            $fileName = $this->request->getVar('gambar_old');
        }

        try {
            $update = [
                'gambar' => $fileName
            ];
            $galeri->update($id, $update);
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Berhasil Diupdate']);
    }

    //delete galeri
    public function deletegaleri()
    {
        $galeri = new GaleriModel();
        $id = $this->request->getVar('id');
        try {
            $data = $galeri->find($id);
            $galeri->delete($id);
            if ($data['gambar'] != 'contoh.jpg') {
                if (file_exists('assets/upload/' . $data['gambar'])) {
                    unlink('assets/upload/' . $data['gambar']);
                }
            }
        } catch (\Throwable $th) {
            return json_encode(['code' => 0, 'msg' => $th->getMessage()]);
        }
        return json_encode(['code' => 1, 'msg' => 'Data Selesai Dihapus']);
    }
}
