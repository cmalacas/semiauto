<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Week;

class WeekController extends Controller
{
    public function index() {

        $cols = [
           'Year',
           'Week',
           'Start Date',
           'End Date',
           'Working Days'
        ];

        $weeks = Week::all();

        $table = view('weeks.table', ['cols' => $cols, 'weeks' => $weeks])->render();

        $data = [
                    'table' => $table
                ];

        return view('weeks.index', $data);

    }
}
