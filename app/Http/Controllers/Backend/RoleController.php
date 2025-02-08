<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function showEmployees ()
    {
        $employees = User::where('role', '!=', 'admin')->get();
        return view('backend.employee.show-employee', compact('employees'));
    }
    public function createEmployees ()
    {
        return view('backend.employee.create-employee');
    }
    public function storeEmployees (Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        $user->save();
        toastr()->success('New Employee is added successfully!');
        return redirect()->back();
    }
    public function editeEmployees ($id)
    {
        $employee = User::find($id);
        return view('backend.employee.edite-employee', compact('employee'));
    }
    public function updateEmployees (Request $request, $id)
    {
        $employee = User::find($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->role = $request->role;
        if(isset($request->password)){
            $employee->password = Hash::make($request->password);
        }

        $employee->save();
        toastr()->success('Employee is Updated successfully!');
        return redirect()->back();
    }
}
