<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ManagerReport;

class ManagerReportsController extends Controller
{
    public function index() {

        $cols = ['Store', 'Employee ID', 'Days Worked', 'Units'];

        $reports = ManagerReport::all();

        $table = view('manager-reports.table', ['cols' => $cols, 'reports' => $reports])->render();

        $data = [
                    'table' => $table,
                    'year' => date("Y"),
                    'week' => date("W")
        ];

        return view('manager-reports.index', $data);


    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        $row = 0;

        $week = $request->get('week');
        $year = $request->get('year');

        foreach ($fileContents as $line) {

            $data = str_getcsv($line);

            if ($row > 0) {

                list($store_id, $emp_id, $days, $units) = $data;

                $cond = ['emp_id' => $emp_id, 'week' => $week, 'year' => $year, 'store_id' => $store_id];

                $values = [
                        'week' => $week,
                        'year' => $year,
                        'days' => $days,
                        'units' => (int)$units
                    ];

                ManagerReport::updateOrCreate( $cond, $values );

            }

            $row++;

        }

        return redirect()->route('managerReportIndex');

    }
}
