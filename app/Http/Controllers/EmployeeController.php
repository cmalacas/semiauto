<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {

        $cols = [
            'EMP ID',
            'LAST NAME',
            'FIRST NAME',
            'EMAIL',
            'WORK EMAIL',
            'PAY METHOD CODE',
            'HOURLY RATE',
            'STANDARD HOURS',
            'ANNUAL RATE',
            'EMP TYPE CODE',
            'HOME PHONE NUMBER',
            'IS EXEMPT',
            'CLIENT LEGAL NAME',
            'EEO JOB CLASS CODE',
            'STATUS DATE',
            'LAST HIRE DATE',	
            'ORGINAL HIRE DATE',
            'SENIORITY DATE',
            'TERMINATION DATE',
            'IS ACTIVE'
        ];

        $employees = Employee::all();

        $table = view('employee.table', ['cols' => $cols, 'employees' => $employees])->render();

        $data = [
                    'table' => $table
        ];

        return view('employee.index', $data);

    }
}
