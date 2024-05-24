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

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        $row = 0;

        foreach ($fileContents as $line) {

            $data = str_getcsv($line);

            if ($row > 0) {

                list(
                    $emp_id, 
                    $last_name, 
                    $first_name, 
                    $email, 
                    $phone, 
                    $job_title, 
                    $location_code,
                    $last_hire_date,
                    $status_code,
                    $status_date,
                    $job_codes,
                    $type_code, 
                    $standard_hours
                ) = $data;

                $condition = ['emp_id' => $emp_id];
                
                $values = [
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'work_email' => $email,
                    'email' => $email,
                    'home_phone_number' => $phone,
                    'last_hire_date' => self::toMySql( str_replace(' - CDT', '', $last_hire_date) ),
                    'status_date' => self::toMySql( str_replace(' - CDT', '', $status_date) ),
                    'eeo_job_class_code' => $job_codes,
                    'emp_type_code' => $type_code,
                    'standard_hours' => $standard_hours
                ];

                Employee::updateOrCreate( $condition, $values );

            }

            $row++;

        }

        return redirect()->route('employeeIndex');

    }

    static function toMySql( $date ) {

        return date("Y-m-d", strtotime( $date ));

    }
}
