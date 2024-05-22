<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class DashboardController extends Controller
{
    public function reporting() {

        $employees = Employee::all();

        $data = ['employees' => $employees];

        return view('dashboard', $data);

    }
}
