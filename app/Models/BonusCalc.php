<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class BonusCalc extends Model
{
    use HasFactory;

    protected $fillable = [
                            'emp_id',
                            'store_id',
                            'week_id',
                            'year',
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

    public static function getTotalLeadershipBonus( $week, $year, $state = '' ) {

        $bonus = 0;

        $bonus = BonusCalc::select(DB::raw('SUM(bonus_leadership) as bonus'))
                    ->where('week_id', '=', $week)
                    ->where('year', '=', $year)
                    ->whereRaw('store_id IN (SELECT store_id FROM stores WHERE state = "'.$state.'")')
                    ->first()
                    ->bonus;



        return $bonus > 0 ? number_format( $bonus, 2) : '-';

    }

    public static function getTotalManagerBonus( $week, $year, $state = "" ) {

        $bonus = 0;

        $bonus = BonusCalc::select(DB::raw('SUM(bonus_sales_mgr + bonus_store_mgr) as bonus'))
                    ->where('week_id', '=', $week)
                    ->where('year', '=', $year)
                    ->whereRaw('store_id IN (SELECT store_id FROM stores WHERE state = "'.$state.'")')
                    ->first()
                    ->bonus;


        return $bonus > 0 ? number_format( $bonus, 2) : '-';

    }

    public static function getTotalSalesBonus( $week, $year, $state = "" ) {

        $bonus = 0;

        $bonus = BonusCalc::select(DB::raw('SUM(bonus_sales) as bonus'))
                    ->where('week_id', '=', $week)
                    ->where('year', '=', $year)
                    ->whereRaw('store_id IN (SELECT store_id FROM stores WHERE state = "'.$state.'")')
                    ->first()
                    ->bonus;


        return $bonus > 0 ? number_format( $bonus, 2) : '-';

    }

    public static function getTotalTechBonus( $week, $year, $state = "" ) {

        $bonus = 0;

        $bonus = BonusCalc::select(DB::raw('SUM(bonus_tech) as bonus'))
                    ->where('week_id', '=', $week)
                    ->where('year', '=', $year)
                    ->whereRaw('store_id IN (SELECT store_id FROM stores WHERE state = "'.$state.'")')
                    ->first()
                    ->bonus;


        return $bonus > 0 ? number_format( $bonus, 2) : '-';

    }

    public static function getTotalCollectionBonus( $week, $year, $state = "" ) {

        $bonus = 0;

        $bonus = BonusCalc::select(DB::raw('SUM(bonus_collections) as bonus'))
                    ->where('week_id', '=', $week)
                    ->where('year', '=', $year)
                    ->whereRaw('store_id IN (SELECT store_id FROM stores WHERE state = "'.$state.'")')
                    ->first()
                    ->bonus;


        return $bonus > 0 ? number_format( $bonus, 2) : '-';

    }

    public static function getTotalBonus( $week, $year, $state = "" ) {

        $bonus = 0;

        $bonus = BonusCalc::select(DB::raw('SUM(bonus_sales + bonus_sales_mgr + bonus_tech + bonus_collections + bonus_store_mgr + bonus_leadership + bonus_one_time) as bonus'))
                    ->where('week_id', '=', $week)
                    ->where('year', '=', $year)
                    ->whereRaw('store_id IN (SELECT store_id FROM stores WHERE state = "'.$state.'")')
                    ->first()
                    ->bonus;


        return $bonus > 0 ? number_format( $bonus, 2) : '-';

    }
}
