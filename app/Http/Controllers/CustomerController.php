<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;



use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();
        return view('customer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Customer::all();
        return view('customer.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            'password' => 'required',
            ]);
        $data = new Customer();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password = sha1($request->password);
        if($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/customer_image'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        Session::flash('success','Customer Added Successfully');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customer::find($id);
        return view('customer.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::findorFail($id);
        return view('customer.edit',compact('data',));
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
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            ]);
        $data = Customer::findorFail($id);
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if($request->file('photo')) {
            @unlink(public_path('upload/customer_image/'.$data->photo));
            $file = $request->file('photo');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/customer_image'), $filename);
            $data['photo'] = $filename;
        
        }
        $data->save();
        Session::flash('success','Customer Updated Successfully');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findorFail($id);
        if($data['photo']) {
            @unlink(public_path('upload/customer_image/'.$data->photo));
        
        }
        $data->delete();
        Session::flash('success','Customer  Deleted Successfully');
        return redirect()->route('customer.index');
    }
}
