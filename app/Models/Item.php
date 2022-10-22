<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'model_item_id',
        'name',
        'amount',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function modelItem()
    {
        return $this->belongsTo(ModelItem::class);
    }
}
