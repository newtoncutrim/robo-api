<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;
    protected $fillable = [
        'left_elbow_id',
        'right_elbow_id',
        'left_wrist_id',
        'right_wrist_id',
        'head_rotation_id',
        'head_tilt_id',
        'right_elbow',
        'left_elbow',
        'right_wrist',
        'left_wrist',
        'head_tilt',
        'head_rotation',
    ];

    public function rightElbowMovement()
    {
        return $this->belongsTo(ArmMoviment::class, 'right_elbow_id');
    }

    public function leftElbowMovement()
    {
        return $this->belongsTo(ArmMoviment::class, 'left_elbow_id');
    }

    public function rightWristMovement()
    {
        return $this->belongsTo(WristMoviment::class, 'right_wrist_id');
    }

    public function leftWristMovement()
    {
        return $this->belongsTo(WristMoviment::class, 'left_wrist_id');
    }

    public function headTiltMovement()
    {
        return $this->belongsTo(HeadTiltMoviment::class, 'head_tilt_id');
    }

    public function headRotationMovement()
    {
        return $this->belongsTo(HeadRotationMoviment::class, 'head_rotation_id');
    }
}
