<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArmMoviment extends Model
{
    use HasFactory;

    protected $table = 'arm_moviments';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['description'];

    public $timestamps = false;

}
