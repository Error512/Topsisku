<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'nama_kriteria',
        'bobot',
        'cos_ben',
        'pilih'
        
    ];

    protected $guarded = ['id'];
    
}
