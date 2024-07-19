<?php
namespace App\Models;
use CodeIgniter\Model;
class MapViewModel extends Model
{
    protected $table = 'view'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['id', 'lng', 'lat', 'zoom'];
    public function dos(){
        return $this->findAll();
    }
}
