<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = ['name', 'telp', 'start_reservation_date', 'end_reservation_date', 'location', 'package', 'payment', 'payment_status', 'rental_status', 'staff'];
    use HasFactory;
}
