<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Support
 * @package App\Models
 * @version February 28, 2017, 7:54 am UTC
 */
class Support extends Model
{

    public $table = 'supports';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:30|min:5',
        'phone' => 'required|min:10|max:15|regex:/(0)[0-9]{9}/',
        'email' => 'required|email'
    ];
    
}
