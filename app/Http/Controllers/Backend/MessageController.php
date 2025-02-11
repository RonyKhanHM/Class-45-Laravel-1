<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\ReturnRequest;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showContactMessages ()
    {
        $messages = ContactMessage::get();
        return view('backend.message.contact', compact('messages'));
    }
    public function deleteContactMessages ($id)
    {
        $message = ContactMessage::find($id);
        $message->delete();

        toastr()->success('Delete Successfully!');
        return redirect()->back();
    }

    //Return process request..............................
    public function showRetunrReqMessages ()
    {
        $returnReq = ReturnRequest::get();
        return view('backend.message.return-request', compact('returnReq'));
    }
    public function deleteRetunrReqMessages ($id)
    {
        $return = ReturnRequest::find($id);
        $return->delete();

        toastr()->success('Delete Successfully!');
        return redirect()->back();
    }
}
