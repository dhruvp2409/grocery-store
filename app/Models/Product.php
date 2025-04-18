<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','category_id','price','description','image','total_sold','stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
