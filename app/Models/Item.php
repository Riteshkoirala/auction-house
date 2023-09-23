<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'lot_id',
        'lot_number',
        'name_of_artist',
        'year_work_produced',
        'subject_classification',
        'description',
        'auction_date',
        'estimated_price',
        'is_archived',
        'category',
        'image_type',
        'dimension',
        'drawing_medium',
        'painting_medium',
        'framed',
        'material_used',
        'weight',
        'image_name',
        'in_auction',
    ];
}
