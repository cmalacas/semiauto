<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BonusCalc;
use App\Models\Bonus;
use App\Models\Week;

use App\Models\VitalStat;

use App\Models\Store;

use DB;

//use Yajra\DataTables\Facades\DataTables;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($week = 0, $year = 0)
    {
        if ($week == 0) {

            $week = date("W");

        }

        if ($year == 0) {

            $year = date("Y");

        }

        $startYear = 2024;

        $years = [];

        for($y = $startYear; $y <= $year; $y++) {

            $years = [ $y ];

        }

        $weeks = [];

        for( $i = 1; $i <= 52; $i++) $weeks[$i] = $i;

        $bonuses = [];

        if (self::weekHasData($week, $year)) {

            Bonus::_get($week, $year);

            $bonuses = BonusCalc::where('week_id', '=', $week)
                    ->where('year', '=', $year)->get();

        }

        $cols = [
            'EMP ID',
            'STORE ID',
            'WEEK',
            'BONUS SALES',
            'BONUS SALES MGR',
            'BONUS TECH',
            'BONUS COLLECTIONS',
            'BONUS STORE MGR',
            'BONUS SERVICE',
            'BONUS LEADERSHIP',
            'BONUS ONE-TIME',
            'BONUS TOTAL',
        ];

        
        $table = view('bonus.table', [ 'cols' => $cols, 'bonuses' => $bonuses ] )->render();

        // $table = DataTables::collection($bonuses)->toJson();

        $data = [
                    'table' => $table,
                    'weeks' => $weeks,
                    'years' => $years,
                    'current_year' => $year,
                    'current_week' => $week
                ];

        

        return view('bonus.index', $data);
    }

    static function weekHasData($week, $year)
    {
        $result = VitalStat::where('year', '=', $year)
                    ->where('week_number', '=', $week )
                    ->first();

        if ($result) {

            return true;

        }

        return false;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function log( $year = 0 )
    {
        if ($year == 0) {

            $year = date("Y");

        }

        $bonus = BonusCalc::find(1);


        $minWeek = 1; //self::get_min_week( $year );
        $maxWeek = 52; //self::get_max_week( $year );

        $states = self::get_store_states();

        $forTable = [
                        'minWeek' => $minWeek,
                        'maxWeek' => $maxWeek,
                        'states' => $states,
                        'bonus' => $bonus,
                        'year' => $year
                    ];

        $table = view('bonus.log-table', $forTable)->render();

        $data = [
                    'table' => $table
                ];

        return view('bonus.log', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    static function get_min_week( $year )
    {
        return VitalStat::select(DB::raw('MIN(week_number) as week'))
                    ->where('year', '=', $year)
                    ->first()
                    ->week;
    }

    /**
     * Display the specified resource.
     */
    public function get_max_week( $year )
    {
        return VitalStat::select(DB::raw('MAX(week_number) as week'))
                    ->where('year', '=', $year)
                    ->first()
                    ->week;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function get_store_states()
    {
        return Store::select('state', 'state_name')
                    ->groupBy('state_name')
                    ->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
