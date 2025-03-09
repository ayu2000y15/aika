<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';
    protected $primaryKey = 'INFORMATION_ID';
    const CREATED_AT = 'INS_DATE';
    const UPDATED_AT = 'UPD_DATE';
    public $timestamps = true;

    protected $fillable = [
        'TITLE', 'CONTENT', 'PRIORITY', 'POST_DATE', 'SPARE1', 'SPARE2', 'DEL_FLG'
    ];

    protected $dates = ['POST_DATE', 'INS_DATE', 'UPD_DATE'];

    public function scopeActive($query)
    {
        return $query->where('DEL_FLG', '0');
    }
}
