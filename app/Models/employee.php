<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'firstname', 
        'middlename', 
        'lastname', 
        'age', 
        'position', 
        'birthday', 
        'startdate', 
        'email', 
        'phone', 
        'image'
    ];
}
