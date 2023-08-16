<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class OfferLetter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $date;
    public $username; // Define the property to be accessible in the view
    public $salary;
    public $designation;
    public $address;
    public $pdfName;
    public $letter_head;


    /**
     * Create a new message instance.
     *
     * @param string $username
     */
    public function __construct($date, $username, $salary, $designation, $address, $pdfName, $letter_head)
    {
        $this->date = $date;
        $this->username = $username;
        $this->salary = $salary;
        $this->designation = $designation;
        $this->address = $address;
        $this->pdfName = $pdfName;
        $this->letter_head = $letter_head;
    }




    public function build()
    {
        $pdfContents = $this->letter_head;



        return $this->subject('Offer Letter')
            ->view('admin.emails.offer_letter')
            ->attachData($pdfContents, 'offer_letter.pdf', [
                'mime' => 'application/pdf',
            ])
            ->with([
                'date' => $this->date,
                'username' => $this->username,
                'salary' => $this->salary,
                'designation' => $this->designation,
                'address' => $this->address,
            ]);
    }
}
