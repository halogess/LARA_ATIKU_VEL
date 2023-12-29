<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;

    use HasFactory;
    protected $connection ="mysql";
    protected $table ="dtrans";
    protected $primaryKey = "id_dtrans";
    public $incrementing = false;
    public $timestamps = false;
}
