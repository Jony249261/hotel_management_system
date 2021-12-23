<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Department;

use Illuminate\Http\Request;

class StaffDepartmentController extends Controller
{
    public function index()
    {
        $data = Department::all();
        return view('department.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'title' => 'required',
            'detail' => 'required',
            ]);
        $data = new Department();
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->save();
        Session::flash('success','Department Added Successfully');
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Department::find($id)->first();
        return view('department.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Department::findorFail($id);
        return view('department.edit',compact('data'));
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
        $data = Department::findorFail($id);
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            ]);
            $data->title = $request->title;
            $data->detail = $request->detail;
        $data->save();
        Session::flash('success','Department Updated Successfully');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::find($id)->delete();
        Session::flash('success','Room  Deleted Successfully');
        return redirect()->route('department.index');
    }
}
