<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package App\Models
 * @version February 28, 2017, 7:26 pm UTC
 */
class Menu extends Model
{

    public $table = 'menus';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_cat',
        'id_teacher',
        'cost',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_cat' => 'integer',
        'id_teacher' => 'integer',
        'cost',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:50'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function catalogs()
    {
        return $this->belongsTo(\App\Models\Catalog::class, 'id_cat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function times()
    {
        return $this->belongsToMany(\App\Models\times::class,'time_menu','id_menu','id_time');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function teachers()
    {
        return $this->belongsTo(\App\Models\teachers::class, 'id_teacher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function events()
    {
        return $this->belongsToMany(\App\Models\Event::class,'event_menu','id_menu','id_event');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function lessons()
    {
        return $this->belongsToMany(\App\Models\Lesson::class,'lesson_menu','id_menu','id_lesson');
    }
}
