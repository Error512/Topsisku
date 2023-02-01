<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'csv',

        
    ];


    protected $guarded = ['id'];

}
