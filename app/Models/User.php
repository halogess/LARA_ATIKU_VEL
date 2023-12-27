<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Saldo;

class User extends Authenticatable
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "user";
    protected $primaryKey = "id_user";
    public $incrementing = false;
    public $timestamps = false;

    public function Saldo(){
        return $this->hasOne(Saldo::class, "id_user", "id_user");
    }

}
