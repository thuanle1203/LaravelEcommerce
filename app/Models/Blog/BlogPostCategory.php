<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_name_en',
        'blog_category_name_hin',
        'blog_category_slug_en',
        'blog_category_slug_hin'
    ];
}
