<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'summary', 'project_image', 'category_id'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}