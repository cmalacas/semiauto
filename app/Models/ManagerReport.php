<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerReport extends Model
{
    use HasFactory;

    protected $fillable = ['emp_id', 'store_id', 'week', 'year', 'units', 'days'];
}
