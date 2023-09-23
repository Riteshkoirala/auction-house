<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'lotNumber',
        'updated_at',
        'is_archive',
        'auction_id',
    ];
}
