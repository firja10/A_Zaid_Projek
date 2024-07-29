<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Snap;

use App\Services\Midtrans\CreateSnapTokenService; // => put it at the top of the class
use Illuminate\Support\Facades\DB;

use App\Services\Midtrans\CallbackService;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction, $transaction_id)
    {
        //


        // $transaction_id = Transaction::findOrFail($transaction_id);

        $transaction_id = DB::table('transactions')->where('order_id', $transaction_id)->first();

        
        $snapToken = $transaction_id->snap_token;
        if (is_null($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($transaction_id);
            $snapToken = $midtrans->getSnapToken();

            // $transaction_id->snap_token = $snapToken;
            // $transaction_id->save();

            Transaction::where('order_id', $transaction_id->order_id)->update([

                'snap_token'=>$snapToken

            ]);


        }

        return view('konsumen.show', compact('transaction_id', 'snapToken'));


        // return view('konsumen.show', compact('transaction', 'snapToken'));


    }



    public function receive()
    {
        $callback = new CallbackService;
 
        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $transaction = $callback->getTransaction();
 
            if ($callback->isSuccess()) {
                Transaction::where('id', $transaction->id)->update([
                    'status' => 2,
                ]);
            }
 
            if ($callback->isExpire()) {
                Transaction::where('id', $transaction->id)->update([
                    'status' => 3,
                ]);
            }
 
            if ($callback->isCancelled()) {
                Transaction::where('id', $transaction->id)->update([
                    'status' => 4,
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



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
