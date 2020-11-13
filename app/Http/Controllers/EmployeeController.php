<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllEmployees(Request $request)
    {
        $employees = Employee::orderBy('id', 'DESC');

        if ($request->id) {
            $employees->where('id', $request->id);
        }

        if ($request->name) {
            $employees->where('name', $request->name);
        }

        if ($request->lastname) {
            $employees->where('lastname', $request->lastname);
        }

        if ($request->birthdate) {
            $employees->where('birthdate', $request->birthdate);
        }

        if ($request->personal_id) {
            $employees->where('personal_id', $request->personal_id);
        }

        if ($request->salary) {
            $employees->where('salary', $request->salary);
        }

        $employees = $employees->get();

        return view('employees-page')->with('employees', $employees);
    }

    public function saveEmployee(Request $request)
    {
        Employee::create([
            'name'     => $request->name,
            'lastname'    => $request->lastname,
            'birthdate'     => $request->birthdate,
            'personal_id'    => $request->personal_id,
            'salary' => $request->salary
        ]);

        return redirect()->route('employees.all');
    }

    public function editEmployee($id)
    {
        $employee_to_edit = Employee::where('id', $id)->firstOrFail();

        return view('edit-employee')->with('employee', $employee_to_edit);
    }

    public function updateEmployee(Request $request, $id)
    {
        Employee::where('id', $id)->update([
            'name'     => $request->name,
            'lastname'    => $request->lastname,
            'birthdate'     => $request->birthdate,
            'personal_id'    => $request->personal_id,
            'salary' => $request->salary
        ]);

        return redirect()->route('employees.all');
    }

    public function deleteEmployee(Request $request)
    {
        Employee::where('id', $request->employee_id)->delete();

        return redirect()->back();
    }
}
