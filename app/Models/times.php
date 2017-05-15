<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class times
 * @package App\Models
 * @version March 12, 2017, 4:18 pm UTC
 */
class times extends Model
{

    public $table = 'times';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'time_start',
        'time_end'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'time_start' => 'required',
        'time_end' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function menus()
    {
        return $this->belongsToMany(\App\Models\Menu::class,'time_menu','id_time','id_menu');
    }
}
