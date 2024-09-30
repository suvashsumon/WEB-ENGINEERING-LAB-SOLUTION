<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getAll()
    {
        $employees = Employee::paginate(15);
        // return view("viewall", compact($employees));
        return view("viewall", ['employees'=>$employees]);
    }

    public function deleteById($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            $employee->delete();
        }
        return redirect("/view-all");
    }

    public function create()
    {
        return view('createpage');
    }

    public function createEmployee(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'designation'=>'required',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:2000|max:20000',
            'email' => 'required|email|unique:employees',
            'mobile_no' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        $employee = new Employee();

        $employee->name = $req->name;
        $employee->designation = $req->designation;
        $employee->joining_date = $req->joining_date;
        $employee->salary = $req->salary;
        $employee->email = $req->email;
        $employee->mobile_no = $req->mobile_no;
        $employee->address = $req->address;

        $employee->save();

        return redirect("/view-all");
    }

    public function updateview($id)
    {
        $employee = Employee::find($id);
        return view("updatepage", ['employee'=>$employee]);
    }

    public function update(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'designation'=>'required',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:2000|max:20000',
            'email' => 'required|email|unique:employees',
            'mobile_no' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        
        $employee = Employee::find($req->id);

        $employee->name = $req->name;
        $employee->designation = $req->designation;
        $employee->joining_date = $req->joining_date;
        $employee->salary = $req->salary;
        $employee->email = $req->email;
        $employee->mobile_no = $req->mobile_no;
        $employee->address = $req->address;

        $employee->save();
        return redirect("/view-all");

    }

    public function search(Request $req)
    {
        if($req->text=="") return redirect("/view-all");
        $text = $req->text;
        $employees = Employee::where("name",'LIKE','%'.$text.'%')->orWhere("designation", 'LIKE', '%'.$text.'%')->get();
        return view('search', ['employees'=>$employees]);
    }
}
