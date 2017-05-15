<?php

namespace App\Repositories;

use App\Models\times;
use InfyOm\Generator\Common\BaseRepository;

class timesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'times'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return times::class;
    }
}
