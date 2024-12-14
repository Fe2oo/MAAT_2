<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::get();
        return view('admin.employee.index', compact('employees'));
    }
    public function show($id){
        $User = User::findOrFail($id);
        return view('admin.employee.show',compact('User'));
    }
    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(EmployeeRequest $request){
        $data= $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->back()->with('msg','Added...');
    }
    public function edit($id){
        $employee = User::findOrFail($id);
        return view('admin.employee.edit',compact('employee'));
    }
    public function destroy($id){
        $employee=User::findOrFail($id);
        $employee->delete();
        return redirect()->back()->with('msg','Deleted..');
    }
    public function update (EmployeeRequest $request , $id){
        $data = $request->validated();
        $employee = User::findOrFail($id);
        $employee->update($data);
        return redirect()->back()->with('msg', 'Updated...');
    }
}
