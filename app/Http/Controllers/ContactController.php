<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InquiryMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
    
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
    
        Mail::to('info@ceylongit.online')->send(new InquiryMail($data));
    
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
