<?php

namespace App\Repositories;

use App\Models\teachers;
use InfyOm\Generator\Common\BaseRepository;

class teachersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'email',
        'address',
        'information'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return teachers::class;
    }
}
