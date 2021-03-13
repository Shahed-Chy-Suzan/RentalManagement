<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//-----------------------------------Newsletter--------------------------------------
    public function newsletter(){
        $newsletter=DB::table('newsletters')->get();
        return view('admin.newsletter.newsletter',compact('newsletter'));
    }
    //------ delete -------------
    public function deletenewsletter($id){
        DB::table('newsletters')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//----------------//--------------//--------------//----------------//----------------//----------------//----


//--------------------------User Contact Message----------------------------------
// --ekhane Database onosare "Status" er term gular rules holo :--
//         Status = 0 = New Message
//         Status = 1 = Already Replayed Message

// --ekhane Database onosare "review" er term gular rules holo :--
//         Status = 0 = Dont show(default)
//         Status = 1 = Show as a review
//--------------------------------------------------------------------------------

//----------------User Contact Message//Get_in_Touch--------------------------
    public function contact(){
        $contact=DB::table('contacts')->where('status',0)->get();
        return view('admin.contact.contact',compact('contact'));
    }

//------ delete -------------
    public function deleteContact($id){
        DB::table('contacts')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Successfully Contact-Message Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//------------View-------------------
    public function viewContact($id){
        $view=DB::table('contacts')->where('id',$id)->first();
        return view('admin.contact.view',compact('view'));
    }

//---------------All Message(nav)----------------
    public function allContact(){
        $contact=DB::table('contacts')->where('status',1)->get();
        return view('admin.contact.contact',compact('contact'));
    }

//------------Mark as Read----------------------
    public function markAsRead($id){
        DB::table('contacts')->where('id',$id)->update(['status'=> 1]);
        $notification=array(
                'message'=>'Successfully message marked as read',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

//-------------Mark as Unread--------------------
    public function markAsUnRead($id){
        DB::table('contacts')->where('id',$id)->update(['status'=> 0]);
        $notification=array(
                'message'=>'Message marked as Unread',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

//------------Show as Review----------------------
    public function showReview($id){
        DB::table('contacts')->where('id',$id)->update(['review'=> 1]);
        $notification=array(
                'message'=>'Review added in website',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

//-------------Dont show as a Review--------------------
    public function dontShowReview($id){
        DB::table('contacts')->where('id',$id)->update(['review'=> 0]);
        $notification=array(
                'message'=>'Removed this as a review',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

}
