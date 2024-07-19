<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'user'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'iduser';
    protected $allowedFields = ['username', 'nama', 'password']; 
}
