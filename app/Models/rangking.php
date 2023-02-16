<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rangking extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'alternatif',
        'preferensi',
        'urutan'
        
    ];

    protected $guarded = ['id'];
}
