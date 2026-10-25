<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\IpLookUp;

class TripBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $ipData;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->ipData = IpLookUp::getData();
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.trip-booking')
        ->to(config('app.email'), config('app.name'))
        ->subject('Inquiry from ' . config('app.name'))
        ;
    }
}
