<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bonus;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id = 0, $year = 0)
    {
        if ($id == 0) {

            $id = date("w");

        }

        if ($year == 0) {

            $year = date("Y");

        }

        
        $data = [
                    'bonuses'  => Bonus::_get( $id, $year )
                ];

        return view('report.view', $data);
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
