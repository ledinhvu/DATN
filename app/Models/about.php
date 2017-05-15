<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class about
 * @package App\Models
 * @version February 27, 2017, 1:56 pm UTC
 */
class about extends Model
{

    public $table = 'abouts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'content',
        'check'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:50|min:3',
        'content' => 'required',
        'check' => 'required'
    ];

    
}
