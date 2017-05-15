<?php

namespace App\Repositories;

use App\Models\Images;
use InfyOm\Generator\Common\BaseRepository;

class ImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'id_event',
        'id_news',
        'id_lesson'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Images::class;
    }
}
