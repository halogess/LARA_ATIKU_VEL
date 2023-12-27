<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $connection ="mysql";
    protected $table ="status_transaksi";
    protected $primaryKey = "id_status";
    public $incrementing = false;
    public $timestamps = false;


}
