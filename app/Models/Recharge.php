<?php

namespace App\Models;

use App\Models\Address;
use App\Models\RegimeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recharge extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'id'
    ];
}
