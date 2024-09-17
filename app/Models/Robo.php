<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robo extends Model
{
    use HasFactory;
    protected $table = 'robos';
    protected $fillable = [
        'left_elbow',
        'right_elbow',
        'left_wrist',
        'right_wrist',
        'rotation_head',
        'slope_head',
    ];
}
