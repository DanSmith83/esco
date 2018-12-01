<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductSubscription extends Mailable
{
    use SerializesModels;

    private $subscriber;
    private $products;

    public function __construct($subscriber, $products)
    {
        $this->subscriber = $subscriber;
        $this->products = $products;
    }

    public function build()
    {
        return $this->from('noreply@xyz.com')
                    ->view('mail.product-subscription')
                    ->with([
                        'subscriber' => $this->subscriber,
                        'products'   => $this->products,
                    ]);
    }
}
