<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreUnit extends Model
{
    use HasFactory;

    protected $fillable = ['emp_id', 'week_number', 'year', 'store_id', 'units'];
}
