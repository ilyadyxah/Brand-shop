<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getList()
    {
        return Category::select(['id', 'name'])
            ->get()
            ->pluck('name', 'id');
    }
}
