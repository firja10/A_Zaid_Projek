<?php
 
namespace App\Http\Controllers;
 
use App\Models\Order;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;
 
class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;
 
        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();
 
            if ($callback->isSuccess()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 2,
                ]);

                $order_id = Order::where('id', $order->id)->first();


                $explode_payment = explode("-", $notification->order_id);

            
                Pemesanan::where('kode_pesanan', $order_id->number)->update([

                    'status_pemesanan'=>2,
                    // 'pembayaran'=>strtoupper($explode_payment[0]),
                    'pembayaran'=>strtoupper($notification->payment_type),

                ]);
            }
 
            if ($callback->isExpire()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 3,
                    
                ]);


                $order_id = Order::where('id', $order->id)->first();

                $explode_payment = explode("-", $notification->order_id);

                Pemesanan::where('kode_pesanan', $order_id->number)->update([

                    'status_pemesanan'=>3,
                    // 'pembayaran'=>strtoupper($explode_payment[0]),
                    'pembayaran'=>strtoupper($notification->payment_type),

                ]);


            }
 
            if ($callback->isCancelled()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);

                $order_id = Order::where('id', $order->id)->first();

                $explode_payment = explode("-", $notification->order_id);

                Pemesanan::where('kode_pesanan', $order_id->number)->update([

                    'status_pemesanan'=>4,
                    // 'pembayaran'=>strtoupper($explode_payment[0]),
                    'pembayaran'=>strtoupper($notification->payment_type),

                ]);

            }
 
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}