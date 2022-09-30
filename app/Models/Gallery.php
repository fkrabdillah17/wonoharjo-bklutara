<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['tag', 'title', 'file', 'content', 'slug'];
    use HasFactory;
}
