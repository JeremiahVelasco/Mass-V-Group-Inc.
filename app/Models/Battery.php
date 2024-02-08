<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'mvgi',
        'jis_type',
        'warranty',
        'description1',
        'description2',
        'description3',
        'saved_slot',
    ];
    public $timestamps=false;
}
