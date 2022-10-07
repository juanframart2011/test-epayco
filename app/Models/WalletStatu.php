<?php

namespace App\Models;

use App\Models\Address;
use App\Models\RegimeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletStatu extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'wallet_status';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'id'
    ];
}