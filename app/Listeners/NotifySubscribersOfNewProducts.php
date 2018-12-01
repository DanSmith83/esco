<?php
/**
 * Created by PhpStorm.
 * User: danielsmith
 * Date: 29/11/2018
 * Time: 20:16
 */

namespace App\Listeners;


use App\Events\ProductsWereAdded;

class NotifySubscribersOfNewProducts
{
    public function handle(ProductsWereAdded $event)
    {
        $subscribers = $this->getSubscribers();

        foreach ($subscribers as $subscriber) {
            $this->queueMessage($subscriber, $event->getProducts());
        }
    }

    private function getSubscribers()
    {
        return \App\User::where('new_product_subscription', true)->get();
    }

    private function queueMessage($subscriber, $products)
    {
        \Mail::to($subscriber->email)->send(new \App\Mail\ProductSubscription($subscriber, $products));
    }
}