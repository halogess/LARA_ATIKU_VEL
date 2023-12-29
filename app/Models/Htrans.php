<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "htrans";
    protected $primaryKey = "nomor_nota";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nomor_nota',
        'tanggal_beli',
        'id_pembeli',
        'id_admin',
        'total_item',
        'total_harga',
        'active'
    ];

    public function Status()
    {
        return $this->hasMany(Status::class, 'nomor_nota', 'nomor_nota');
    }

    public function Pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli', 'id_user');
    }
}
