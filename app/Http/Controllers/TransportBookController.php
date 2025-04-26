<?php

namespace App\Http\Controllers;

use App\Models\TransportBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransportBookingNotification;
use App\Mail\TransportBookingConfirmation;
use Illuminate\Support\Facades\Validator;

class TransportBookController extends Controller
{
    public function index()
    {
        $bookings = TransportBook::orderBy('created_at', 'desc')->get();
        return view('admin.transport.index', compact('bookings'));
    }

   
    public function sendBooking(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'required_date' => 'required|date',   
            'duration' => 'required',
            'goods_type' => 'required',           
            'additional_details' => 'required',  
        ]);
    
        // Save to database
        $booking = TransportBook::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'required_date' => $request->required_date,
            'duration' => $request->duration,
            'goods_type' => $request->goods_type,
            'additional_details' => $request->additional_details,
            'completed' => false,
        ]);
    
        // Prepare email data
        $maildata = [
            'name' => $booking->name,
            'phone' => $booking->phone,
            'email' => $booking->email,
            'date' => $booking->required_date,
            'duration' => $booking->duration,
            'goods' => $booking->goods_type,
            'details' => $booking->additional_details,
            'created_at' => $booking->created_at,
        ];
    
        // Send email to admin
        Mail::to('info@ceylongit.online')->send(new TransportBookingNotification($maildata));
    
        // Send confirmation email to user
        if ($booking->email) {
            Mail::to($booking->email)->send(new TransportBookingConfirmation($maildata));
        }
    
        // ===== SMS Sending Logic =====
        try {
            $request2 = new \HTTP_Request2();
            $request2->setUrl('https://ypyr29.api.infobip.com/sms/2/text/advanced');
            $request2->setMethod(\HTTP_Request2::METHOD_POST);
            $request2->setConfig(['follow_redirects' => true]);
            $request2->setHeader([
                'Authorization' => 'App 3fc0f9dd93c53ce0e672ef0d6bf97c5f-927523ed-ee2f-46e3-b616-014c31d47d17',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]);
    
            $smsText = "New transport booking received:\nName: {$booking->name}\nPhone: {$booking->phone}\nDate: {$booking->required_date}\nGoods: {$booking->goods_type}";
    
            $smsBody = json_encode([
                "messages" => [[
                    "destinations" => [["to" => "94765645303"]],
                    "from" => "447491163443",
                    "text" => $smsText
                ]]
            ]);
    
            $request2->setBody($smsBody);
            $response = $request2->send();
    
            if ($response->getStatus() != 200) {
                \Log::error("SMS Error: " . $response->getStatus() . " - " . $response->getReasonPhrase());
            }
        } catch (\HTTP_Request2_Exception $e) {
            \Log::error('SMS Sending Error: ' . $e->getMessage());
        }
        // ===== END SMS =====
    
        return back()->with('success', 'Your booking has been submitted successfully!');
    }
    
    public function complete($id)
    {
        $booking = TransportBook::findOrFail($id);
        $booking->update(['completed' => true]);
        
        return redirect()->back()->with('success', 'Booking marked as completed');
    }

    public function destroy($id)
    {
        $booking = TransportBook::findOrFail($id);
        $booking->delete();
        
        return redirect()->back()->with('success', 'Booking deleted successfully');
    }
}