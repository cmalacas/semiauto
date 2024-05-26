<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusCalc extends Model
{
    use HasFactory;

    protected $fillable = [
                            'emp_id',
                            'store_id',
                            'week_id',
                            'bonus_sales',
                            'bonus_sales_mgr',
                            'bonus_tech',
                            'bonus_collections',
                            'bonus_store_mgr',
                            'bonus_service',
                            'bonus_leadership',
                            'bonus_one_time',
                            'bonus_total'
                ];
}
