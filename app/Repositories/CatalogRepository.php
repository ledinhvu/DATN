<?php

namespace App\Repositories;

use App\Models\Catalog;
use InfyOm\Generator\Common\BaseRepository;

class CatalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Catalog::class;
    }
}
