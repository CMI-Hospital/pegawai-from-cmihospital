<?php
// WorkReport.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkReport extends Model
{
    protected $fillable = ['pegawai_id', 'start_time', 'end_time', 'work_description', 'work_date'];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }
}
