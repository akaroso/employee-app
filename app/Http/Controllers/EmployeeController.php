<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Exception\NotFoundException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|max:11|min:11',
            'salary' => 'required|numeric|min:3200|max:1000000',
            'gender' => 'required',
            'hire_date' => 'required'
        ]);
        return Employee::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $user = Employee::findOrFail($id);
            return $user;
          
          } catch (\Exception $e) {
          
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $employe = Employee::findOrFail($id);
          
          } catch (\Exception $e) {
          
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
          }
          $validated = $request->validate([
            'name' => 'max:100',
            'email' => 'email',
            'phone' => 'max:11|min:11',
            'salary' => 'numeric|min:3200|max:1000000',
        ]);
        $employe->update($validated);
        return $employe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $employe = Employee::findOrFail($id);
          
          } catch (\Exception $e) {
          
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
          }
        $employe->delete();
        return 200;
    }

    /**
     * Filter and find specificc employee
     *
     * @param string
     * @return \Illuminate\Http\Response
     */
    public function filter($query)
    {
        $employe = DB::table('employees')
        ->orWhere('name','LIKE' , '%'.$query.'%')
        ->orWhere('email','LIKE', '%'.$query.'%')
        ->orWhere('phone','LIKE', '%'.$query.'%')
        ->get();
        return $employe;
    }
}
