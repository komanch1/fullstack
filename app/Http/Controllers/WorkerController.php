<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Department;
use Carbon\Carbon;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $workerQuery = Worker::query();//->orderByDesc('id')->get()
        if($request->filled('sort')){
            if($request->all()['sort'] == "id"){
                $workerQuery->orderBy('id')->get();
            }
            if($request->all()['sort'] == "desc_id"){
                $workerQuery->orderByDesc('id')->get();
            }
            if($request->all()['sort'] == "name"){
                $workerQuery->orderBy('name')->get();
            }
            if($request->all()['sort'] == "desc_name"){
                $workerQuery->orderByDesc('name')->get();
            }
            if($request->all()['sort'] == "salary"){
                $workerQuery->orderBy('salary')->get();
            }
            if($request->all()['sort'] == "desc_salary"){
                $workerQuery->orderByDesc('salary')->get();
            }
            // if($request->all()['sort'] == "department"){
            //     $workerQuery->orderBy('department')->get();
            // }
            // if($request->all()['sort'] == "desc_department"){
            //     $workerQuery->orderByDesc('department')->get();
            // }
            // dd($request->all()['sort']);
        }
        
        $workers = $workerQuery->paginate(3);//
        
        return view('workers.index', compact('workers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Department::
        return view('workers.create' );
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
            'salary' => 'required'
        ]);
        // $mytime = new Carbon();
        // $mytime->now()->toDateTimeString();
        $worker = new Worker([
            'name' => $request->get('name'),
            'salary' => $request->get('salary'),
            // 'department_id' => null,
        ]);
        $worker->save();
        return redirect('/workers')->with('success', 'Worker saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Worker::find($id);
        $worker = Worker::find($id);
        return view('workers.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('workers.edit', compact('worker'));
        // return response()->json([ $worker]);
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
            'salary' => 'required'
        ]);
        Worker::find($id)->update([
            'name' => $request->get('name'),
            'salary' => $request->get('salary'),
            'department_id' => $request->get('department_id')
        ]);
        // return Worker::find($id);
        return redirect('/workers')->with('success', 'Worker updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Worker::find($id)->delete();
        return redirect('/workers')->with('success', 'Worker delete!');
    }
}
