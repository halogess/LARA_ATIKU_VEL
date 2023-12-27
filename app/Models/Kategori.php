<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    use HasFactory;

    protected $connection = "mysql";
    protected $table = "kategori";
    protected $primaryKey = "id_kategori";
    public $incrementing = false;
    public $timestamps = false;
}
