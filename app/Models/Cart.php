<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "cart";
    protected $primaryKey = "id_cart";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_pembeli', // tambahkan kolom ini ke dalam $fillable
        // tambahkan kolom-kolom lain yang diizinkan untuk diisi secara massal
        'kode_barang',
        'qty',
        'total_harga',
    ];
}
