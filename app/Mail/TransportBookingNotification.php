<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransportBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingData;

    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
    }

    public function build()
    {
        return $this->subject('New Transport Booking Request')
                    ->view('emails.transport_booking')
                    ->with(['data' => $this->bookingData]);
    }
}