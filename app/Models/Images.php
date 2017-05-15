<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Images
 * @package App\Models
 * @version February 28, 2017, 8:05 pm UTC
 */
class Images extends Model
{

    public $table = 'images';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'id_news',
        'id_lesson'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id_news' => 'integer',
        'id_lesson' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image.*' => 'mimes:jpeg,jpg,png|max:8192',
        'image' => 'required'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_update = [
        'image.*' => 'mimes:jpeg,jpg,png|max:8192'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function news()
    {
        return $this->belongsTo(\App\Models\News::class, 'id_news');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'id_lesson');
    }
}
