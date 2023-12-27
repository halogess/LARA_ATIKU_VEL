<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;
    protected $connection ="mysql";
    protected $table ="htrans";
    protected $primaryKey = "nomor_nota";
    public $incrementing = false;
    public $timestamps = false;

    public function Status(){
        return $this->belongsToMany(Status::class);
    }


}
