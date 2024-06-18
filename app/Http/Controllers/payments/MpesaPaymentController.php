<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Device;
use App\Repository\STKPush;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use AfricasTalking\SDK\AfricasTalking;


// fb1b8a8716c77dfcb9dbd065de352efc95b40807723470ec9b309fcd258717ab
class MpesaPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function getToken()
    {
        // $url = env('MPESA_ENV') == 0 ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        // : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        // $curl = curl_init($url);
        $consumer_key = "8Yilw5XE0tHuRAGURwSiQpS08ISAfrgQ";
        $consumer_secret = "17SA0meYnbJrJQ1d";
        $credentials = base64_encode($consumer_key . ":" . $consumer_secret);

        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);
        // Log::info(json_decode($curl_response)->access_token);
        return json_decode($curl_response)->access_token;

        // curl_setopt_array(
        //     $curl,
        //     array(
        //         CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset = utf8'],
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_HEADER => false,
        //         CURLOPT_USERPWD => config('app.mpesa_consumer_key') . ':' . config('app.mpesa_consumer_secrete')

        //     )
        // );
        // $response = curl_exec($curl);

        // // dd(json_decode($response)->access_token);
        // curl_close($curl);
        // return json_decode($response)->access_token;
    }
    public function stkPush()
    {

        $BusinessShortCode = 174379;
        $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $timestamp = Carbon::rawParse('now')->format('YmdHms');

        $password = base64_encode($BusinessShortCode . $passkey . $timestamp);
        $Amount = 1;
        $PartyA = 254799535642;
        $PartyB = 174379;
        $accessToken = $this->getToken();


        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer' . $accessToken)); //setting custom header

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount"' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $PartyB,
            'PhoneNumber' => $PartyA,
            'CallBackURL' => 'https://8a5c-154-157-38-3.ngrok-free.app/api/confirmation/',
            'AccountReference' => 'CodeXcellent Education ',
            'TransactionDesc' => 'Testing stkpush on Sandbox '
        );
        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);


        return $curl_response;
    }

    public function registerUrl()
    {
        $body = array(
            'shortCode' => config('app.mpesa_shortcode'),
            'ResponseType' => 'completed',
            // 'confirmationURL' => config('app.mpesa_test_url') . '/api/confirmation',
            'confirmationURL' => config('app.mpesa_test_url'),
            // 'validationURL' => config('app.mpesa_test_url') . '/api/validation',
            'validationURL' => config('app.mpesa_test_url'),
        );

        $url = env('MPESA_ENV') == 0 ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
            : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        // $response = $this->getHttp($url, $body);
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization:Bearer' . $this->getToken()),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($body)
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        dd($curl_response);

        return ($curl_response);
    }
    public function getHttp($url, $body)
    {

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization:Bearer' . $this->getToken()),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($body)
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return ($curl_response);
    }
    function index(Device $device, Cart $cart)
    {



        $sum = Cart::join('devices', 'carts.device_id', '=', 'devices.id')->where('carts.user_id', auth()->user()->id)
            ->selectRaw('carts.item_count*devices.price')
            ->get();
        // dd($sum);



        $mysum = 0;
        foreach ($sum as $arr => $val) {
            // dd($val);

            foreach ($val->toArray() as $price => $vals) {
                // dd($price);
                // dd($vals);

                $mysum += $vals;



            }
        }
        return view('payments.mpesa', compact('mysum'));
    }

    public function store(Cart $cart, Device $device, Request $request, STKPush $sTKPush)
    {


        $request->validate([
            'phone' => 'required|min:12|max:12'
        ]);
        $cart = Cart::join('devices', 'devices.id', 'carts.device_id')->where('carts.user_id', auth()->user()->id)
            ->selectRaw('devices.price*carts.Item_count')->get();

        $mysum = 0;

        foreach ($cart as $arr => $val) {

            foreach ($val->toArray() as $arrs => $vals) {
                $mysum += $vals;




            }




        }

        $phone_number = $request->phone;

        $amount = $mysum;

        $amount = ceil($amount);
        // dd($amount);

        if (config('app.environment') === 'production') {
            $amount = 1;
        }
        // dd($amount);

        $response = $sTKPush->sTKPushPayment($amount, $phone_number);
        dd($response);

        $rep = json_decode($response, true);

        dd($rep);

    }

    public function afriStkPush(Request $request)
    {

        $phone = $request->phone;
        $phone = '+'.$phone;
        $afriUsername = 'sandbox';
        $amount = $request->amount;
        $afriApi = 'c3fd407a543ddc47165b591e92bd8eb72e689388a5c33bd44ee79420a1f08e08';

        $AT = new AfricasTalking($afriUsername, $afriApi);

        $payments = $AT->payments();

        try {
            $transaction = $payments->mobileCheckout([
                'productName' => 'STKPUSH',
                // 'providerChannel'=>'Nober',
                'phoneNumber' => $phone,
                'currencyCode' => 'KES',
                'amount' => $amount,
                'metadata' => ['customerId' => '123']
            ]);
        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
      
        // echo json_encode($transaction);
        return $transaction;

    }
}