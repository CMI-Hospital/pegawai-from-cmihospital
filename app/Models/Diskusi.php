<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi'; // Assuming your table name is 'diskusi'

    protected $fillable = [
        'konten_id',
        'konten_tanggal',
        'konten_jam',
        'konten_isi',
        'konten_cek',
        'konten_poin',
        'no_pegawai',
        'remember_token'
    ];

    // The attributes that should be mutated to dates.
    protected $dates = ['konten_tanggal', 'created_at', 'updated_at'];
    
    public function pegawai()
{
    return $this->belongsTo(Pegawai::class, 'no_pegawai', 'no_pegawai');
}

}