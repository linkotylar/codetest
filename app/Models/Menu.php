<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'menus';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'icon',
        'parent_id',
        'order_by'
    ];

    protected $casts = [
        'name'      =>  'string',
        'icon'      =>  'string',
        'parent_id' =>  'integer',
        'order_by'  =>  'integer'
    ];

    public static $rules = [
        'name'  =>  'required'
    ];

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
