<?php

namespace App\Repository;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;


class STKPush
{
    public static function sTKPushPayment($amount, $phone_number)
    {
        $auth_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $stk_push_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $consumer_key = config('app.mpesa_consumer_key');
        $consumer_secret = config('app.mpesa_consumer_secrete');
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        dd($consumer_key);
        // dd($mp=env('MPESA_CONSUMER_KEY'));
        $ch = curl_init();
       
        curl_setopt($ch, CURLOPT_URL, $auth_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // dd(curl_exec($ch));
        $curl_response = curl_exec($ch);
        dd($curl_response);


        $access_token = json_decode($curl_response)->access_token;

        curl_setopt($ch, CURLOPT_URL, $stk_push_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token));

        $timestamp = date('YmdHis');
        $passkey = config('app.mpesa_passe_key');
        $shortCode = config('app.mpessa_business_shortcode');
        $password = base64_encode($shortCode . $passkey . $timestamp);


        $curl_post_data = [
            'BusinessShortCode' => $shortCode,
            'Password'  => $password,
            'Timestamp'  => $timestamp,
            'TransactionType' => config('app.mpesa_transaction_type'),
            'Amount' => $amount,
            'PartyA' => $phone_number,
            'PartyB' => $shortCode,
            'PhoneNumber' => $phone_number,
            'CallBackURL' => config('app.mpesa_callback_url'),
            'AccountReference' => config('app.mpesa_account_reference'),
            'TransactionDesc' => config('app.mpesa_transaction_description'),

        ];


        $data_string = json_encode($curl_post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $curl_res = curl_exec($ch);

        return $curl_res;
    }

    public static function confirmation(Request $request)
    {
        $callbackData = $request->all();
        $callbackData = json_encode($callbackData);

        $data = json_decode($callbackData); //decoding data

        $result_code = $data->Body->stkCallback->ResultCode;

        if ($result_code==0) {
            $resultCode = $data->Body->stkCallback->ResultCode;  //if no issue, it gives 0
            $resultDescription = $data->Body->stkCallback->ResultDesc;
            $merchantRequestID = $data->Body->stkCallback->MerchantRequestID;
            $checkoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
            $amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $mpesaReceiptNumber = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value; //this is the code
            $transactionDate = $data->Body->stkCallback->CallbackMetadata->Item[3]->Value; //date
            $phoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value; //date

            Transaction::create([
                'result_code' => $resultCode,
                'result_description' => $resultDescription,
                'merchant_request_id' => $merchantRequestID,
                'checkout_request_id' => $checkoutRequestID,
                'amount' => $amount,
                'mpesa_receipt_number' => $mpesaReceiptNumber,
                'transaction_date' => $transactionDate,
                'phone_number' => $phoneNumber,
            ]);


            //complete the process here
        } else {
            $resultCode = $data->Body->stkCallback->ResultCode;
            $resultDescription = $data->Body->stkCallback->ResultDesc;
            $merchantRequestID = $data->Body->stkCallback->MerchantRequestID;
            $checkoutRequestID = $data->Body->stkCallback->CheckoutRequestID;

            Transaction::create([
                'result_code' => $resultCode,
                'result_description' => $resultDescription,
                'merchant_request_id' => $merchantRequestID,
                'checkout_request_id' => $checkoutRequestID,
                'amount' => null,
                'mpesa_receipt_number' => null,
                'transaction_date' => null,
                'phone_number' => null,
            ]);
        }
    }

}
