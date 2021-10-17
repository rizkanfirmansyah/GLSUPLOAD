<?php

namespace App\Models;

use CodeIgniter\Model;

class Resume extends Model
{
    protected $table                = 'resume';
    protected $allowedFields        = [
        'resume_ids',
        'resume_token',
        'resume_name',
        'token',
        'resume_city',
        'resume_category',
        'resume_subcategory',
        'resume_participant',
        'resume_status',
        'resume_agency',
        'resume_agency_address',
        'resume_agency_new',
        'resume_agency_address_new',
        'resume_gender',
        'resume_phone',
        'resume_email',
        'resume_facebook',
        'resume_instagram',
        'resume_photo',
        'resume_suggestion',
        'resume_impression',
        'created_at',
        'updated_at',
    ];

    // Dates
    protected $useTimestamps        = true;

}
