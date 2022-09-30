<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['thumbnail', 'title', 'content', 'slug', 'author'];
    use HasFactory;
}
