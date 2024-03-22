<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Comment extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'comments';

    protected $fillable = [
        'id',
        'pegawai_id',
        'article_id',
        'comment'


    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'id');
    }

}
