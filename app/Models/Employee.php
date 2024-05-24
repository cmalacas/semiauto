<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{   
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = ['first_name', 'last_name', 'work_email', 'email', 'home_phone_number', 'last_hire_date', 'status_date', 'eeo_job_class_code', 'emp_type_code', 'standard_hours'];
}
