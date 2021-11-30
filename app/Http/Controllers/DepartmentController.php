<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $departments = Department::orderByDesc('id')->get();
        $departmentQuery = Department::query();//->orderByDesc('id')->get()
        if($request->filled('sort')){
            if($request->all()['sort'] == "id"){
                $departmentQuery->orderBy('id')->get();
            }
            if($request->all()['sort'] == "desc_id"){
                $departmentQuery->orderByDesc('id')->get();
            }
            if($request->all()['sort'] == "name"){
                $departmentQuery->orderBy('name')->get();
            }
            if($request->all()['sort'] == "desc_name"){
                $departmentQuery->orderByDesc('name')->get();
            }
            // if($request->all()['sort'] == "worker"){
            //     $departmentQuery->orderBy('worker_id')->get();
            // }
            // if($request->all()['sort'] == "worker"){
            //     $departmentQuery->orderByDesc('worker_id')->get();
            // }
        }
        // dd(Department::workers());
        $departments = $departmentQuery->paginate(9);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $department = new Department([
            'name' => $request->get('name'),
        ]);
        $department->save();
        return redirect('/departments')->with('success', 'Department saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Department::find($id);
        $department = Department::find($id);
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Department::find($id)->update([
            'name' => $request->get('name'),
            'department_id' => $request->get('department_id')
        ]);
        return redirect('/departments')->with('success', 'Department updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Department::find($id)->delete();
    }
}
