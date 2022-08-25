<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $table = 'departments';

    public $fillable = [
        'department'
    ];

    protected $casts = [
        'department'      =>  'string',
    ];

    public static $rules = [
        'department'  =>  'required'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
