<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RoomType::all();
        return view('roomtype.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('roomtype.create');
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
            'details' => 'required',
            ]);
        $data = new RoomType();
        $data->title = $request->title;
        $data->details = $request->details;
        $data->save();
        Session::flash('success','Room Type Added Successfully');
        return redirect()->route('roomtype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RoomType::find($id)->first();
        return view('roomtype.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RoomType::findorFail($id);
        return view('roomtype.edit',compact('data'));
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
        $data = RoomType::findorFail($id);
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            ]);
        $data->title = $request->title;
        $data->details = $request->details;
        $data->save();
        Session::flash('success','Room Type Updated Successfully');
        return redirect()->route('roomtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RoomType::find($id)->delete();
        Session::flash('success','Room Type Deleted Successfully');
        return redirect()->route('roomtype.index');
    }
}
