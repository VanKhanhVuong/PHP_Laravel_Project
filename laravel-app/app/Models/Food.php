<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory;

    protected $table = 'foods';
    protected $primarykey = 'id';
    public $timestamps = true;

    // For Editable models
    protected $fillable = ['name', 'count', 'description', 'image_path' ,'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
