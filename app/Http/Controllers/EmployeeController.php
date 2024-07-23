<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json([
            'message' => 'Employees retrieved successfully',
            'data' => $employees
        ]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:employees,email',
            'phoneNumber' => 'required|string',
            'address' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'salary' => 'required|string'
        ]);

        $employee = Employee::create($request->all());
        return response()->json([
            'message' => 'Employee created successfully',
            'data' => $employee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'message' => 'Employee retrieved successfully',
            'data' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:employees,email,' . $employee->id,
            'phoneNumber' => 'required|string',
            'address' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'salary' => 'required|string'
        ]);
        
        $employee->update($request->all());
        return response()->json([
            'message' => 'Employee updated successfully',
            'data' => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'message' => 'Employee deleted successfully'
        ]);
        // return response()->json(['message' => 'Employee deleted successfully'], 204);
    }
}
