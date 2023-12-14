<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "serverchat";
    protected $primaryKey = "id_admin";
    public $incrementing = false;
    public $timestamps = false;
}
