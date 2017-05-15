<?php

namespace App\Repositories;

use App\Models\about;
use InfyOm\Generator\Common\BaseRepository;

class aboutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'check'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return about::class;
    }
}
