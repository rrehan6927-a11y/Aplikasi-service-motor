<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    use HasFactory;

    protected $table = 'daftar_services';
    protected $primaryKey = 'id_servis';

    protected $fillable = [
        'no_plat',
        'id_pelanggan',
        'nama_pelanggan',
        'keluhan_kendaraan',
        'tanggal_servis'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'no_plat', 'no_plat');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function dataService()
    {
        return $this->hasOne(DataService::class, 'id_servis', 'id_servis');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_servis', 'id_servis');
    }
}