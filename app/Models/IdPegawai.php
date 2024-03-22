<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class IdPegawai extends Authenticatable
{
    // Set the connection to the second database
    protected $connection = 'second_database';

    use HasFactory, Notifiable, HasRoles;

    protected $table = 'id_pegawai';

    protected $fillable = [
        'id',
        'nama',
        'hp',
        'email'

    ];

}
