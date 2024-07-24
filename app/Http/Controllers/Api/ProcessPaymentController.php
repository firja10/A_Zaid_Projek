<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class ProcessPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            // 'name'=>'required',
            'amount'=>'required',
        ]);

        if ($validator->failed()) {
            # code...

            return response()->json($validator->errors(), 400);

        }

        $transaction = Transaction::create(
            [
                // 'name'=>$request->name,
                // 'invoice_number'=>'INV-' .uniqid(),
                'invoice_number'=>$request->invoice_number,
                'amount'=>$request->amount,
                'status'=>'CREATED',
                'order_id'=>$request->order_id,
            
                ]
        );

        $resp = Http::withHeaders([

            'Accept'=>'application/json',
            'Content-Type'=>'application/json',


        ])->withBasicAuth('SB-Mid-server-QgJVmztJ8S2fOSLZ3fbG_o7E','')
        ->post('https://api.sandbox.midtrans.com/v2/charge', [
            'payment_type'=>'gopay',
            // 'payment_type'=>'qris', 
            "transaction_details"=>[ 
        // 'order_id'=> $transaction->id,
        'order_id'=> $transaction->order_id,
        'gross_amount'=> $transaction->amount

        // 'gross_amount'=> $request->amount
            ],
            // 'qris'=>[
            //     'acquirer'=>'gopay'
            // ]
        ]);

        if($resp->status() == 201 || $resp->status() == 200){

            $actions = $resp->json('actions');
            if (empty($actions)) {
                # code...
                return response()->json(['message'=>$resp['status_message']], 500);
            }

            $actionMap =[];

            foreach ($actions as $action) {
                # code...

                $actionMap[$action['name']] = $action['url'];
            }

            // return response()->json(['qr'=>$actionMap['generate-qr-code']]);


            Transaction::where('order_id', $request->order_id)->update([
                'image_qris'=>$actionMap['generate-qr-code']
            ]);


            $transaction_id = DB::table('transactions')->where('order_id', $request->order_id)->first();



            // return redirect($actionMap['generate-qr-code']);

            return redirect('konsumen/Pembayaran_QRIS/' . $transaction_id->id);



        }


        return response()->json(['message'=> $resp->body()], 500);

    }
}
