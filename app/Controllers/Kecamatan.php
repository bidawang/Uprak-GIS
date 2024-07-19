<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MapViewModel;
use App\Models\KecamatanModel;

class Kecamatan extends Controller
{
    public function index()
    {
        $model = new KecamatanModel();
        $view = new MapViewModel();
        $data['bengkel'] = $model->tek();
        $data['view'] = $view->dos(); 
        return 
        view('kecamatan/pecah/header', $data).
        view('kecamatan/index', $data).
        view('kecamatan/pecah/footer', $data);
    }

    public function create()
{
    $model = new KecamatanModel();

    // Ambil data POST dari form
    $data = [
        'nama_bengkel' => $this->request->getPost('nama_bengkel'),
        'latitude' => $this->request->getPost('latitude'),
        'longitude' => $this->request->getPost('longitude'),
        'polygon_geojson' => $this->request->getPost('polygon_geojson'),
        'warna' => $this->request->getPost('warna'),
        'keterangan' => $this->request->getPost('keterangan'),
    ];

    // Ambil file yang diunggah dari form
    $file = $this->request->getFile('pentolan');
    $gambarFile = $this->request->getFile('gambar');

    // Cek apakah file `pentolan` telah diunggah dengan benar
    if ($file && $file->isValid() && !$file->hasMoved())
    {
        // Baca file ke dalam variabel untuk disimpan di BLOB
        $data['pentolan'] = file_get_contents($file->getPathname());
    }

    // Cek apakah file `gambar` telah diunggah dengan benar
    if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved())
    {
        // Baca file ke dalam variabel untuk disimpan di BLOB
        $data['gambar'] = file_get_contents($gambarFile->getPathname());
    }

    // Simpan ke database
    $model->insert($data);

    // Redirect atau tampilkan pesan sukses
    return redirect()->to('/kecamatan')->with('status', 'Data bengkel berhasil ditambahkan');
}

    
public function update()
{
    $model = new KecamatanModel();

    // Ambil data POST dari form, termasuk id
    $id = $this->request->getPost('id');
    $data = [
        'nama_bengkel' => $this->request->getPost('nama_bengkel'),
        'latitude' => $this->request->getPost('latitude'),
        'longitude' => $this->request->getPost('longitude'),
        'polygon_geojson' => $this->request->getPost('polygon_geojson'),
        'warna' => $this->request->getPost('warna'),
        'keterangan' => $this->request->getPost('keterangan'),
    ];

    // Ambil file yang diunggah dari form
    $file = $this->request->getFile('pentolan');
    $gambarFile = $this->request->getFile('gambar');

    // Cek apakah file `pentolan` telah diunggah dengan benar
    if ($file && $file->isValid() && !$file->hasMoved())
    {
        // Baca file ke dalam variabel untuk disimpan di BLOB
        $data['pentolan'] = file_get_contents($file->getPathname());
    }

    // Cek apakah file `gambar` telah diunggah dengan benar
    if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved())
    {
        // Baca file ke dalam variabel untuk disimpan di BLOB
        $data['gambar'] = file_get_contents($gambarFile->getPathname());
    }

    // Update data di database berdasarkan $id
    $model->update($id, $data);

    // Redirect atau tampilkan pesan sukses
    return redirect()->to('/kecamatan')->with('status', 'Data bengkel berhasil diperbarui');
}

    public function delete($id)
    {
        $model = new KecamatanModel();

        // Hapus data dari database berdasarkan $id
        $model->delete($id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/kecamatan')->with('status', 'Data bengkel berhasil dihapus');
    }
}
