<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "keterangan_status";
    protected $primaryKey = "kode_status";
    public $incrementing = false;
    public $timestamps = false;
}
