<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $connection = 'second_database'; // Specify the second database connection

    protected $table = 'absensi'; // Specify the table name
}