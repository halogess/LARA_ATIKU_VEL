<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "pesanan";
    protected $primaryKey = "id_pesanan";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_pesanan',
        'status',
        'id_pembeli'
    ];
}
