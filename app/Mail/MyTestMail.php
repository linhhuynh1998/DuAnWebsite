<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;
    public $item;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders,$item)
    {
        $this->orders = $orders;
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $form_name = 'Store Classic';
        $from_email = 'huynhku68@gmail.com';
        $subject = 'Cảm ơn bạn đã mua hàng';
        return $this->from($from_email, $form_name)
            ->view('frontend.pages.mail.order_mail')
            ->subject($subject)
        ;
    }
}
