<?php

namespace App\Services;

use App\Modules\Order\Models\Order;
use App\Modules\Order\Models\OrderAddress;
use Illuminate\Support\Facades\Mail;

class EmailService
{   
    protected $orderTypeShipping = "shipping";
    protected $orderTypeInnitial= "Innitial";
 

    private function getAddress($orderId, $type)
    {
        return OrderAddress::where('type', $type)->where('order_id', $orderId)->first();
    }

    public function notifyCustomerForOrderSuccess($orderId){ 
        $data["success"]= false;
        $shippingAddress = $this->getAddress($orderId, $this->orderTypeShipping);
        if($shippingAddress){
            Mail::send('mail.order-success', ['orderAddress' => $shippingAddress], function ($mail) use ($shippingAddress) {
                $mail->from('info@raramart.com', 'Rara Mart');
                $mail->to($shippingAddress->email, $shippingAddress->name)->subject('Order Success');
            });
            $data["message"]= "Customer is notified successfully.";
            $data["success"]= true;
        }  
        return $data;
    }
     
    public function notifyAdminForOrderSuccess($orderId){ 
        $data["success"]= false;

        $shippingAddress = $this->getAddress($orderId, $this->orderTypeShipping);
        if($shippingAddress){
            Mail::send('mail.mail-admin', ['orderAddress' => $shippingAddress], function ($mail) use ($shippingAddress) {
                $mail->from('info@raramart.com', 'Rara Mart');
                $mail->to('order@raramart.com')->subject('Order Success');
                // $mail->bcc('raghu.kataria@gmail.com')->subject('Order Success');
            });
            $data["message"]= "Admin is notified successfully.";
            $data["success"]= true;
        }  
        return $data;
    }

    // public function notifyCustomerForIncompleteOrder($orderId){
    //     $order = Order::find($orderId);
    //     $innitialOrder =  OrderStatus::where('title', $orderTypeInnitial);
    //     if($order->status_id == $innitialOrder->id){
    //         if(isset($order->customer)){
    //             if($order->customer->email){
                     
    //             }
    //         }
    //     }
    // }
}