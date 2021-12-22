<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Room;
use App\Models\RoomType;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('room.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = RoomType::all();
        return view('room.create',compact('data'));
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
            'roomtype' => 'required',
            ]);
        $data = new Room();
        $data->title = $request->title;
        $data->room_type_id = $request->roomtype;
        $data->save();
        Session::flash('success','Room Added Successfully');
        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Room::find($id)->first();
        return view('room.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Room::findorFail($id);
        $room = RoomType::all();
        return view('room.edit',compact('data','room'));
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
        $data = Room::findorFail($id);
        $request->validate([
            'title' => 'required',
            'roomtype' => 'required',
            ]);
            $data->title = $request->title;
            $data->room_type_id = $request->roomtype;
        $data->save();
        Session::flash('success','Room Updated Successfully');
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Room::find($id)->delete();
        Session::flash('success','Room  Deleted Successfully');
        return redirect()->route('rooms.index');
    }
}
