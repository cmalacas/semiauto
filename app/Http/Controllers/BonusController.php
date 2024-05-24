<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BonusCalc;
use App\Models\Bonus;
use App\Models\Week;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $week = date("W");
        $year = date("Y");

        if(!self::checkWeekExist($year, $week)){
            
            $data['table'] = "Error: Week $week not found in weeks table.";

        } else {

            Bonus::_get($week, $year);

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

        $bonuses = BonusCalc::all();

        $table = view('bonus.table', [ 'cols' => $cols, 'bonuses' => $bonuses ] )->render();

        $data = [
                    'table' => $table
                ];

        

        return view('bonus.index', $data);
    }

    static function checkWeekExist($year,$week)
    {
        $result = Week::where('year', '=', $year)
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
