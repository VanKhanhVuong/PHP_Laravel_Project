<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $table = 'categories';
    protected $primarykey = 'id';

    protected $fillable = ['name', 'description'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}