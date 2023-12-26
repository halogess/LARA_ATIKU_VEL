<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $connection = "mysql";
    protected $table = "saldo";
    protected $primaryKey = "id_saldo";
    public $incrementing = false;
    public $timestamps = false;
}
