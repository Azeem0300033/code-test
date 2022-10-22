<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function modelItems()
    {
        return $this->hasMany(ModelItem::class);
    }

    public function item(){
        return $this->hasManyThrough(Item::class, ModelItem::class);
    }
}
