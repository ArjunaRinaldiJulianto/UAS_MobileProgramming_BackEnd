<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'address',
        'position',
        'department',
        'salary'
    ];
}
