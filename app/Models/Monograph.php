<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monograph extends Model
{
    protected $fillable = ['category', 'sub_category', 'content'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(Sub_category::class);
    }
    use HasFactory;
}
