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
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'goods' => 'required|string|max:255',
            'details' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Save to database
            $booking = TransportBook::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'required_date' => $request->date,
                'duration' => $request->duration,
                'goods_type' => $request->goods,
                'additional_details' => $request->details,
            ]);

            // Prepare data for email
            $mailData = [
                'name' => $booking->name,
                'phone' => $booking->phone,
                'date' => $booking->required_date,
                'duration' => $booking->duration,
                'goods' => $booking->goods_type,
                'details' => $booking->additional_details,
                'created_at' => $booking->created_at,
            ];

            // Send email
            Mail::to('info@ceylongit.online')->send(new TransportBookingNotification($mailData));

            return response()->json([
                'success' => true,
                'message' => 'Booking request submitted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
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

    // ... keep your other methods (index, complete, destroy) ...
}