<?php

namespace App\Models;

use CodeIgniter\Model;

class Media extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'media';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
                                        'media_ids',
                                        'media_token',
                                        'media_majalah',
                                        'media_ssig',
                                        'media_ssfb',
                                        'media_ssyt',
                                        'media_kegiatan_ig',
                                        'media_kegiatan_fb',
                                        'media_kegiatan_yt',
                                        'media_kegiatan_wa',
                                        'created_at',
                                        'updated_at'
                                    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
