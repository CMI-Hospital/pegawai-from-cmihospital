<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Article extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'articles';

    protected $fillable = [
        'id',
        'title',
        'content',
        'category',
        'image',
        'pegawai_id',
        'approved'

    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'article_id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id');
    }

}
