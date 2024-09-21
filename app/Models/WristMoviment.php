<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WristMoviment extends Model
{
    use HasFactory;

    protected $table = 'wrist_moviments';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['description'];

    public $timestamps = false;
}
