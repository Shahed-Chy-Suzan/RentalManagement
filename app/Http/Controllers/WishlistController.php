<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
//---------------------Store_Email_Modal---------------------------------
    public function storeModal(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['property_code']=$request->property_code;
        $data['status']=0;
        $data['message']=$request->message;
        $data['date']= date('d-m-y');

        $modal= DB::table('interested_properties')->insert($data);
        // return response()->json(['success' => 'Your property order request has been recorded.']);

        $notification = array(
            'message'=>'Your property order request has been recorded.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

}
