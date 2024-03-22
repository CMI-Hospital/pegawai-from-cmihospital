<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Pegawai2 extends Authenticatable
{
    // Set the connection to the second database
    protected $connection = 'third_database';

    use HasFactory, Notifiable, HasRoles;

    protected $table = 'pegawai';

    protected $fillable = [
        'id',
        'no_pegawai',
        'nama_pegawai',
        'no_hp',
        'email'

    ];

}
