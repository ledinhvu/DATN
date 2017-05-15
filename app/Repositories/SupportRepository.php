<?php

namespace App\Repositories;

use App\Models\Support;
use InfyOm\Generator\Common\BaseRepository;

class SupportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Support::class;
    }
}
