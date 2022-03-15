<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getItems($category, $gender, $trending)
    {
        return Items::query()
            ->when($category, function ($query, $category) {
                return $query->whereIn('category_id', $category);
            })
            ->when($gender, function ($query, $gender) {
                return $query->where('gender', $gender);
            })
            ->when($trending, function ($query) {
                return $query->orderBy('updated_at', 'desc');
            })

//            ->orderBy('updated_at', 'asc')
            ->get();
    }

    public static function getPages($itemsPerPage, $items): int // Возвращает количество страниц в зависимости от количества товара
    {
        $count = count( $items);
        return ($count % $itemsPerPage == 0) ? $count / $itemsPerPage : ($count / $itemsPerPage + 1);
    }

    public static function getOnPage($page, $itemsPerPage, $items) // Возвращает товары на выбранной странице
    {
        return $items->slice(($page - 1) * $itemsPerPage, $itemsPerPage);
    }

    public static function getItemById($id)
    {
        return Items::find($id);
    }
}
