<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table   =   'roles';

    protected $dates    =   ['deleted_at'];

    public $fillable = [
        'name',
        'display_name'
    ];

    protected $casts = [
        'name'          =>  'string',
        'display_name'  =>  'string',
    ];

    public static $rules = [
        'name'  =>  'required',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    
    public function menus()
    {
        return $this->hasMany('App\Models\Menu');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }



}
