<?php
namespace App\Models;
use CodeIgniter\Model;
class KecamatanModel extends Model
{
    protected $table = 'bengkel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nama_bengkel', 'latitude', 'longitude', 'polygon_geojson', 'warna', 'keterangan', 'pentolan', 'gambar'];
    public function tek(){
        return $this->findAll();
    }
}