<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lesson
 * @package App\Models
 * @version February 28, 2017, 7:34 pm UTC
 */
class Lesson extends Model
{

    public $table = 'lessons';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:5|max:50',
        'content' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function menus()
    {
        return $this->belongsToMany(\App\Models\Menu::class,'lesson_menu','id_lesson','id_menu');
    }

}
