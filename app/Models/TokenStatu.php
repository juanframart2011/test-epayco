<?php

namespace App\Models;

use App\Models\Address;
use App\Models\RegimeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TokenStatu extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'token_status';

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