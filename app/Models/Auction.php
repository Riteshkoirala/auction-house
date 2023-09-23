<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable =[
      'title',
      'location',
      'auction_date',
      'period',
        'is_archive',
      'description',
        'updated_at',
    ];
}
