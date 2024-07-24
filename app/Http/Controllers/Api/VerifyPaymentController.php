<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VerifyPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;
        $signature = hash('sha512', $orderId.$statusCode.$grossAmount.'SB-Mid-server-QgJVmztJ8S2fOSLZ3fbG_o7E');
        

        Log::info("incoming-notification", $request->all());
        if ($signature != $request->signature_key) {
            # code...

            return response()->json(['message'=>'Invalid Signature'], 400);

        }

        // $transaction = Transaction::find($request->order_id);
        $transaction = DB::table('transactions')->where('id', $request->order_id)->first();

        if ($transaction) {
            # code...
            $status = 'PENDING';
            if ($request->transaction_status == 'settlement') {
                # code...
                $status = 'PAID';
            } elseif ($request->transaction_status == 'expired') {
                # code...
                $status = 'EXPIRED';
            }

        //     // $transaction->status = $status;
        //     // $transaction->save();


            Transaction::where('id', $request->order_id)->update([

                'status'=>$status

            ]);
        // }

        if ($statusCode == 201 || $statusCode == 200) {
            # code...
            Transaction::where('id', $request->order_id)->update([

                'status'=>$status

            ]);
            

        }


        return response()->json(['message'=>'successful']);

    }
}

}