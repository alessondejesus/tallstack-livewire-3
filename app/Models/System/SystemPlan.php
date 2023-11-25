<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemPlan extends Model
{
    use HasFactory;

//use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'features',
        'stripe_id',
    ];
}
