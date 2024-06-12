<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class CustomerData extends Controller
{

    public function CustomerData(Request $req){
        $url =url('/customer');
        $customer=new Customer;
        $countryall =Country::all();
        $countries= $countryall->toArray();
        $title ='Student Registration form';
        $data =compact('url','title','customer','countries');
        return view('customer_form')->with($data);

    }
    public function PostCustomerData(Request $req){

        $req->validate(['name'=>'required','email'=>'required|email','state'=>'required','gender'=>'required','age'=>'required','address'=>'required' ,'timeslot'=>'required' ,'joindate'=>'required'] );
            $customer =new  Customer;

            $customer->name =$req['name'];
            $customer->email =$req['email'];
            $customer->state =$req['state'];
            $customer->gender =$req['gender'];
            $customer->age =$req['age'];
            $customer->address =$req['address'];
            $customer->timeslot =$req['timeslot'];
            $customer->joindate =$req['joindate'];
            $customer->save();
            $data =['success'=>'Successfully added stident'];
            return redirect('customer')->with($data);
    }
     public function GetCustomerDetails() {
            $customer_detail = Customer::all();
            $customer =new  Customer;
            $data =compact('customer_detail','customer');
            return view('customer-detail')->with($data);
    }
    public function DeleteStudent(Request $req) {
        $id=((int)$req['id']);
        if ( $id*1 > 0) {
            $getcustomer =Customer::find($id);
            if(!is_null($getcustomer)) {
             $getcustomer->delete();
             return response()->json(['status'>=200,'success'=>'successfully deleted users']);
            }else{
            return response()->json(['status'>=404,'success'=>'Student  Not found !']);
            }

        }else{
            return response()->json(['status'>=404,'success'=>'Student  Not found !']);

        }


    }
    public function GetUpdateCustomerForm($updated_id) {
        $customer =Customer::find($updated_id) ;
        if(is_null($customer)) {
            return redirect ('/customer-detail');
        }
        $url =url('customer/update')."/".$updated_id;
        $title ='Update Customer';
        $data =compact('customer','title','url');
        return view('customer_form')->with($data);

    }
    public function UpdateCustomerData (Request $req ,$updated_id) {

        $customer =Customer::find($updated_id);
        if(!is_null($customer)) {
            $req->validate(['name'=>'required','email'=>'required|email','state'=>'required','gender'=>'required','age'=>'required','address'=>'required' ,'timeslot'=>'required' ,'joindate'=>'required'] );
            $customer->name =$req['name'];
            $customer->email =$req['email'];
            $customer->state =$req['state'];
            $customer->gender =$req['gender'];
            $customer->age =$req['age'];
            $customer->address =$req['address'];
            $customer->timeslot =$req['timeslot'];
            $customer->joindate =$req['joindate'];
            $customer->save();
            return redirect('customer-detail');
        }

    }
    public function GetCustomerDetailsApi($selectedTimeslot) {

        //
        // $object->created_at->format('M')

        if(!is_null($selectedTimeslot) && $selectedTimeslot!="all") {
            $customer =Customer::where('timeslot', $selectedTimeslot)->first() ;
            if ($customer) {
                $customer_detail = [$customer];
            }else {
                $customer_detail =new Customer;
            }
        }else{
            $customer_detail = Customer::all();

        }

        return response()->json(['status' => 'success', 'data' => $customer_detail], 200);
}
    public function SaveStudentDetails(Request $req) {

        $req->validate(['name'=>'required','email'=>'required|email','state'=>'required','gender'=>'required','age'=>'required','address'=>'required' ,'timeslot'=>'required' ,'joindate'=>'required'] );
        $success ;
        if(((int)$req['id'] ) *1 > 0) {
            $customer =Customer::find($req['id']);
            $success='Sucessfully Updated Students';

        }else {
            $customer =new  Customer;
            $success='Sucessfully Save Students';
        }
        $customer->name =$req['name'];
        $customer->email =$req['email'];
        $customer->state =$req['state'];
        $customer->gender =$req['gender'];
        $customer->age =$req['age'];
        $customer->address =$req['address'];
        $customer->timeslot =$req['timeslot'];
        $customer->joindate =$req['joindate'];
        $customer->save();
        return response()->json(['status' => 'success', 'success' => $success], 200);

    }
    public function GetSelectedStudent(Request $req) {

        $getStudent=Customer::find($req['timeslot']);
        return response()->json(['status' => 'success', 'success' => $success], 200);


    }
}
