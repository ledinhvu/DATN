<?php

namespace App\Repositories;

use App\Models\Lesson;
use InfyOm\Generator\Common\BaseRepository;

class LessonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'content',
        'url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lesson::class;
    }
}
