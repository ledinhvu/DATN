<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Models
 * @version February 28, 2017, 7:40 pm UTC
 */
class Student extends Model
{

    public $table = 'students';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'password',
        'phone',
        'email',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'password' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:30',
        'password' => 'required|max:30',
        'phone' => 'required|digits_between:10,15|numeric',
        'email' => 'required|email|unique:students',
        'address' => 'required|min:3|max:50'
    ];

}
