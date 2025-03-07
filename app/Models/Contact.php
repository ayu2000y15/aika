<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'CONTACT_ID';
    const CREATED_AT = 'INS_DATE';
    const UPDATED_AT = 'UPD_DATE';
    public $timestamps = true;

    protected $fillable = [
        'REFERENCE_NUMBER', 'CONTACT_CATEGORY_ID',
        'COMPANY_NAME',
        'NAME','AGE', 'MAIL', 'TEL',
        'SUBJECT', 'CONTENT', 'MEMO'
    ];

    protected $dates = ['INS_DATE', 'UPD_DATE'];

    public function category()
    {
        return $this->belongsTo(ContactCategory::class, 'CONTACT_CATEGORY_ID', 'CONTACT_CATEGORY_ID');
    }
}
