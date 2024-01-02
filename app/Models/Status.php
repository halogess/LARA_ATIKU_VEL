<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "status_transaksi";
    protected $primaryKey = "id_status";
    public $incrementing = false;
    public $timestamps = false;

    public function Keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'kode_status', 'kode_status');
    }

    protected $fillable = [
        'id_status',
        'nomor_nota',
        'tanggal',
        'kode_status',
        'keterangan'
    ];
}
