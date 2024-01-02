<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "barang";
    protected $primaryKey = "kode_barang";
    public $incrementing = false;
    public $timestamps = false;

    public function kategorinya()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
