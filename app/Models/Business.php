<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['tag', 'field', 'category', 'thumbnail', 'title', 'description', 'whatsapp', 'instagram', 'facebook', 'address'];
    use HasFactory;
}
