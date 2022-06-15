<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'price',
        'image',
        'gender',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(
            Color::class,'options',
            'item_id', 'color_id',
            'id', 'id'
        );
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(
            Size::class,'options',
            'item_id', 'size_id',
            'id', 'id'
        );
    }

    public static function getItems($category = null, $gender = null, $trending= null)
    {
        return Item::query()
            ->when($category, function ($query, $category) {
                return $query->whereIn('category_id', $category);
            })
            ->when($gender, function ($query, $gender) {
                return $query->where('gender', $gender);
            })
            ->when($trending, function ($query) {
                return $query->orderBy('updated_at', 'desc');
            });
    }

    public static function getItemById($id)
    {
        return Item::find($id);
    }
}
