<?php

namespace App\Http\Controllers;

use App\Models\TransportBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransportBookingNotification;
use Illuminate\Support\Facades\Validator;

class TransportBookController extends Controller
{
    public function index()
    {
        $bookings = TransportBook::orderBy('created_at', 'desc')->get();
        return view('admin.transport.index', compact('bookings'));
    }

    public function store(Request $request)
    {

    }
    public function sendBokking(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required|date',
            'duration' => 'required',
            'goods' => 'required',
            'details' => 'required',
        ]);
    
        // Save to database
        $booking = TransportBook::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'required_date' => $request->date,
            'duration' => $request->duration,
            'goods_type' => $request->goods,
            'additional_details' => $request->details,
            'completed' => false, // default value
        ]);
    
        // Prepare data for email (using different field names as required by your template)
        $maildata = [
            'name' => $booking->name,
            'phone' => $booking->phone,
            'date' => $booking->required_date,
            'duration' => $booking->duration,
            'goods' => $booking->goods_type,
            'details' => $booking->additional_details,
            'created_at' => $booking->created_at,
        ];
    
        Mail::to('info@ceylongit.online')->send(new TransportBookingNotification($maildata));
    
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