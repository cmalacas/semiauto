<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BonusCheckRule;

use DB;

class BonusCheckRuleController extends Controller
{
    public function index() {

        $rules = BonusCheckRule::select(
                        DB::raw('bonus_check_rules.*'),
                        DB::raw('CONCAT(employees.first_name, " ", employees.last_name) as employee_name'),
                        DB::raw('stores.store_name'),
                        DB::raw('bonus_types.description as bonus_description')
                    )
                    ->leftJoin('stores', 'stores.store_id', '=', 'bonus_check_rules.store_id')
                    ->join('employees', 'employees.emp_id', '=', 'bonus_check_rules.emp_id')
                    ->join('bonus_types', 'bonus_types.id', '=', 'bonus_check_rules.bonus_type_id')
                    ->get();

        $cols = [
                    'EMP_ID',
                    'EMPLOYE_NAME',
                    'STORE_ID',
                    'STORE_NAME',                    
                    'BONUS_TYPE_ID',
                    'BONUS_DESCRIPTION',
                    'LEADERSHIP_BONUS',
                    'IS_ACTIVE'
                ];

        $table = view('bonus.check-rule-table', ['cols' => $cols, 'rules' => $rules])->render();

        $data = [
                    'table' => $table
                ];

        return view('bonus.check-rule', $data);

    }
}
