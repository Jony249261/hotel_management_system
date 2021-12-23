<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Staff::all();
        return view('staff.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departs=Department::all();
        return view('staff.create',['departs'=>$departs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Staff;

        //$imgPath=$request->file('photo')->store('public/imgs');

        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        //$data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;
        if($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/staff_image'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        Session::flash('success','Staff Added Successfully');
        return redirect('admin/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Staff::find($id);
        return view('staff.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $departs=Department::all();
        $data=Staff::find($id);
       // dd($data);
        return view('staff.edit',compact('departs','data'));
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
        $data=Staff::find($id);

        
        
        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        //$data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;
        if($request->file('photo')) {
            @unlink(public_path('upload/staff_image/'.$data->photo));
            $file = $request->file('photo');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/staff_image'), $filename);
            $data['photo'] = $filename;
        
        }
        $data->save();

        Session::flash('success','Staff Updated Successfully');
        return redirect('admin/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Staff::where('id',$id)->delete();
       Session::flash('success','Staff Deleted Successfully');
        return redirect('admin/staff');
    }

    // All Payments
    function all_payments(Request $request,$staff_id){
        $data=StaffPayment::where('staff_id',$staff_id)->get();
        $staff=Staff::find($staff_id);
        return view('staffpayment.index',['staff_id'=>$staff_id,'data'=>$data,'staff'=>$staff]);
    }

    // Add Payment
    function add_payment($staff_id){
        return view('staffpayment.create',['staff_id'=>$staff_id]);
    }


    function save_payment(Request $request,$staff_id){

        $data=new StaffPayment;
        $data->staff_id=$staff_id;
        $data->amount=$request->amount;
        $data->payment_date=$request->amount_date;
        $data->save();

        return redirect('admin/staff/payment/'.$staff_id.'/add')->with('success','Payment Added Successfully!.');
    }

    public function delete_payment($id,$staff_id)
    {
       StaffPayment::where('id',$id)->delete();
       return redirect('admin/staff/payments/'.$staff_id)->with('success','Data has been deleted.');
    }

   

}
