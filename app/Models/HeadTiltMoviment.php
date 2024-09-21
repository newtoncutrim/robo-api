<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadTiltMoviment extends Model
{
    use HasFactory;
    protected $table = 'head_tilt_moviments';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['description'];

    public $timestamps = false;
}
