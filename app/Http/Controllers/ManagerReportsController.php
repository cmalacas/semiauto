<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerReportsController extends Controller
{
    public function index() {

        $cols = [];

        $reports = [];


        $table = view('manager-reports.table', ['cols' => $cols, 'reports' => $reports])->render();

        $data = [
                    'table' => $table
        ];

        return view('manager-reports.index', $data);


    }
}
