<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'price' => 'required|integer',
            ]);
        $data = new RoomType();
        $data->title = $request->title;
        $data->price = $request->price;
        $data->details = $request->details;
        $data->save();

        if($request->file('imgs')){
            foreach($request->file('imgs') as $img){
                //$file = $request->file('img');
                 $filename = date('Ymdhi').$img->getClientOriginalName();
                $img->move(public_path('image'), $filename);
                $imgData=new Roomtypeimage;
                $imgData->room_type_id=$data->id;
                $imgData->img_src=$filename;
                $imgData->img_alt=$request->title;
                $imgData->save();
            }
        }

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
        
        //dd($request);
        $data = RoomType::findorFail($id);
        $request->validate([
            'title' => 'required',
            'price' => 'required|integer',
            'details' => 'required',
            ]);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->details = $request->details;
        $data->save();

        if($request->file('imgs')){
            $imgData= Roomtypeimage::where('room_type_id',$id)->get();
        foreach($imgData as $imgs){
            //dd($imgs);
            if($imgs['img_src']) {
                @unlink(public_path('image/'.$imgs->img_src));
            
            }
            $imgs->delete();
        }

        foreach($request->file('imgs') as $img){
            //$file = $request->file('img');
             $filename = date('Ymdhi').$img->getClientOriginalName();
            $img->move(public_path('image'), $filename);
            
            $imgData=new Roomtypeimage;
            $imgData->room_type_id=$id;
            $imgData->img_src=$filename;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }
        }
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

    public function destroy_image($img_id)
    {
        $data=Roomtypeimage::where('id',$img_id)->first();
        if($data['img_src']) {
            @unlink(public_path('image/'.$data->img_src));
        
        }
        $data->delete();

       Roomtypeimage::where('id',$img_id)->delete();
       return response()->json(['bool'=>true]);
    }
}
