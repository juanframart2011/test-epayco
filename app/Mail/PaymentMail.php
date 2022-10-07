<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $userCurrent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $data )
    {
        $this->userCurrent = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( env( 'MAIL_FROM_ADDRESS' ), "Validador de compra" )
                
            ->subject( 'Confirmación de compra Epayco' )
            ->view( 'mail.confirmation-payment' )->with([
            'data'  =>  $this->userCurrent
        ]);
    }
}