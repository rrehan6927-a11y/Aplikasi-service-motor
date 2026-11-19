<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    use HasFactory;

    protected $table = 'data_services';
    protected $primaryKey = 'id_data_servis';

    protected $fillable = [
        'id_servis',
        'keluhan_kendaraan',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti'
    ];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class, 'id_servis', 'id_servis');
    }
}