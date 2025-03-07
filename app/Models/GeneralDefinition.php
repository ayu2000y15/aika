<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralDefinition extends Model
{
    protected $table = 'general_definitions';
    const CREATED_AT = 'INS_DATE';
    const UPDATED_AT = 'UPD_DATE';
    public $timestamps = true;

    protected $fillable = [
        'DEFINITION', 'ITEM', 'EXPLANATION',  'SPARE1', 'SPARE2', 'DEL_FLG'
    ];

    protected $dates = ['INS_DATE', 'UPD_DATE'];

    public function scopeActive($query)
    {
        return $query->where('DEL_FLG', '0');
    }
}
