<?php

namespace App\Models;

use CodeIgniter\Model;

class PolygonModel extends Model
{
    protected $table = 'polygon_geojson_parts';
    protected $primaryKey = 'polygon_geojson';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['type', 'properties', 'coordinates', 'created_at'];

    protected $validationRules = [
        'polygon_geojson' => 'required',
        'type' => 'required',
        'coordinates' => 'required'
    ];

    protected $validationMessages = [
        'polygon_geojson' => [
            'required' => 'Polygon geoJSON is required.'
        ],
        'type' => [
            'required' => 'Type is required.'
        ],
        'coordinates' => [
            'required' => 'Coordinates are required.'
        ]
    ];

    protected $beforeInsert = ['validateData'];

    protected function validateData(array $data)
    {
        // Implement custom validation logic if needed
        return $data;
    }

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowCallbacks = true;
}
