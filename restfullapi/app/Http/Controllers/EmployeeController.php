<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function show()
    {
        // dd(Employee::all());
        return EmployeeResource::collection(Employee::all());
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'         => 'required|max:50',
            'job_title'    => 'required|max:100',
            'salary'       => 'required|numeric',
            'department'   => 'required|max:150',
            'joined_date'  => 'required'
        ]);

        $created = Employee::create($request->all());

        return response()->json('Success create employee');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|max:50',
            'job_title'    => 'required|max:100',
            'salary'       => 'required|numeric',
            'department'   => 'required|max:150',
            'joined_date'  => 'required'
        ]);

        $update = Employee::findOrFail($id)->update($request->all());

        return response()->json('Success update employee');
    }

    public function destroy($id)
    {
        $delete = Employee::findOrFail($id)->delete();

        return response()->json('Success delete employe');
    }
}
