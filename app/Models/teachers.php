<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class teachers
 * @package App\Models
 * @version March 12, 2017, 4:13 pm UTC
 */
class teachers extends Model
{

    public $table = 'teachers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'information'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'information' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:30',
        'phone' => 'required|min:10|max:15|regex:/(0)[0-9]{9}/',
        'email' => 'required|email',
        'address' => 'required|min:3|max:50'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function time_menu()
    {
        return $this->belongsToMany(\App\Models\Menu::class,'time_menu','id_menu','id_teachers');
    }
}
