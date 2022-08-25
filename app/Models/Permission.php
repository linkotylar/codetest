<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table   =   'permissions';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'menu_id',
        'key',
        'url',
    ];

    protected $casts = [
        'menu_id'   =>  'integer',
        'key'       =>  'string',
        'url'       =>  'string',
    ];

    public static $rules = [
        'key'   =>  'required',
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
