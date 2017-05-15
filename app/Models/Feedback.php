<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Feedback
 * @package App\Models
 * @version February 28, 2017, 7:43 am UTC
 */
class Feedback extends Model
{

    public $table = 'feedback';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_student',
        'title',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_student' => 'integer',
        'title' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|min:3|max:30',
        'content' => 'required'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'id_student');
    }
}
