<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        return view('website.donate.supportUs');
    }


    public function store(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|min:3|max:70',
                'country' => 'required|string|min:3|max:70',
                'city' => 'required|string|min:3|max:70',
                'email' => 'required|email',
                'phone_number' => 'required',

                'amount' => 'required|int|min:1|max:999999',

            ], [
                'fullname.required' => 'حقل الاسم مطلوب',
                'fullname.min' => 'يجب ان يكون حقل الاسم اكبر من ثلاث حروف',
                'fullname.max' => 'يجب ان يكون حقل الاسم اصغر من 70 حرف',

                'country.required' => 'حقل الدولة مطلوب',
                'country.min' => 'يجب ان يكون حقل الاسم الدولة من ثلاث حروف',
                'country.max' => 'يجب ان يكون حقل الاسم الدولة من 70 حرف',

                'city.required' => 'حقل المدينة مطلوب',
                'city.min' => 'يجب ان يكون حقل الاسم المدينة من ثلاث حروف',
                'city.max' => 'يجب ان يكون حقل المدينة اصغر من 70 حرف',

                'email.required' => 'حقل البريد الالكتروني مطلوب',
                'email.email' => 'الرجاء ادخال بريد الكتروني صحيح',
                'phone_number.required' => 'حقل رقم الهاتف مطلوب',

                'amount.required' => 'حقل المبلغ مطلوب',
                'amount.int' => 'يجب ان يكون المبلغ رقم صحيح',
                'amount.min' => 'يجب ان يكون المبلغ اكبر من واحد دولار',
                'amount.max' => 'يجب ان يكون المبلغ اقل من مليون دولار',

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(['errors' => $validator->errors()->first()]);
            }


            // $input = $request->all();
            // $input['mention_my_name'] = $request->mention_my_name ?? '0';
            // dd($request->all());


            // $mention_my_name = $request->post('mention_my_name') ?? 0;

            $store = Payment::create([
                'fullname' => $request->post('fullname'),
                'email' => $request->post('email'),
                'phone_number' => $request->post('phone_number'),
                'country' => $request->post('country'),
                'city' => $request->post('city'),
                'payment_way' => $request->post('payment_way'),
                'amount' => $request->post('amount'),

                'mention_my_name' => $request->post('mention_my_name') ?? 'no',

                'payment_id' => $request->post('email') . $request->post('payment_way') . $request->post('amount')
            ]);




            // dd(Payment::find($store->id));

            // dd($input['mention_my_name']);


            // $orderID = strval(range(1, 100)) . $store->id . strval(range(1, 100)) . $store->id;

            // $store->update([
            //     'id' => $orderID,
            // ]);



            if ($request->payment_way == 'bankPalestine') {
                return $this->palestine_bank($request->amount, $store->payment_id);
            } else if ($request->payment_way == 'stripe') {
                return $this->stripe($store);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['errors' => $e->getMessage()]))->withInput();
        }
    }

    protected function stripe($store)
    {
        $request = request();
        $numberamount = intval($request->amount);
        //  Start Stripe
        \Stripe\Stripe::setApiKey(Setting::where('key', 'secret-key-stripe')->first()->description ?? '');
        $session = \Stripe\Checkout\Session::create([
            'line_items' =>  [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "Name: " . $store->name,
                    ],
                    'unit_amount' => $numberamount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', ["id" => $store->id], true),
            'cancel_url' => route('cancel', ["id" => $store->id], true),
        ]);

        return redirect($session->url);
    }

    public function success($id)
    {
        $donate = Payment::findOrFail($id);
        $donate->update([
            'status' => "paid",
        ]);
        $donate->save();
        session()->flash('add');
        return redirect()->route('supportUs');
    }

    public function cancel($id)
    {
        $donate = Payment::findOrFail($id)->delete();
        return redirect()->route('supportUs')->withErrors(['errors' => "error"]);
    }



    // --------------------------------------------------------------


    public function palestine_bank($amount, $orderId)
    {
        //Version
        $version = "1.0.0";
        //Merchant ID
        $merchantID = "700099431";
        //Acquirer ID
        $acquirerID = "000089";
        //The SSL secured URL of the merchant to which will send the transaction result
        //This should be SSL enabled – note https:// NOT http://
        $responseURL = route('responseBankPalestine');
        //Purchase Amount
        $purchaseAmt = $amount; // -----------------------------------------------------------
        //Pad the purchase amount with 0's so that the total length is 13 characters, i.e. 20.50 will become 0000000020.50
        $purchaseAmt = str_pad($purchaseAmt, 13, "0", STR_PAD_LEFT);
        //Remove the dot (.) from the padded purchase amount( will know from currency how many digits to consider as decimal)
        //0000000020.50 will become 000000002050 (notice there is no dot)
        $formattedPurchaseAmt = substr($purchaseAmt, 0, 10) . substr($purchaseAmt, 11);
        //US Dollar currency ISO Code; see relevant appendix for ISO codes of other currencies
        $currency = 376;
        //The number of decimal points for transaction currency, i.e. in this example we indicate that US Dollar has 2 decimal points
        $currencyExp = 2;
        //Order number
        $orderID = $orderId; // ------------------------------------------------
        //Specify we want not only to authorize the amount but also capture at the same time. Alternative value could be M (for capturing later)
        $captureFlag = "M";
        //Password
        $password = "mu2aO1jF";
        //Form the plaintext string to encrypt by concatenating Password, Merchant ID, Acquirer ID, Order ID, Formatter Purchase Amount and Currency
        //This will give 1234abcd | 0011223344 | 402971 | TestOrder12345 | 000000002050 | 840 (spaces and | introduced here for clarity)
        $toEncrypt = $password . $merchantID . $acquirerID . $orderID . $formattedPurchaseAmt . $currency;
        //Produce the hash using SHA1. This will give b14dcc7842a53f1ec7a621e77c106dfbe8283779
        $sha1Signature = sha1($toEncrypt);
        //Encode the signature using Base64 before transmitting to
        //This will give sU3MeEKlPx7HpiHnfBBt++goN3k=
        $base64Sha1Signature = base64_encode(pack("H*", $sha1Signature));
        //The name of the hash algorithm use to create the signature; can be MD5 or SHA1; the latter is preffered and is what we used in this example
        $signatureMethod = "SHA1";


        return view('website.donate.bank-palestine.send', get_defined_vars());
    }


    public function responseBankPalestine1()
    {

        $MerID = $_POST['MerID'];
        $AcqID = $_POST['AcqID'];
        $OrderID = $_POST['OrderID'];
        $ResponseCode = intval($_POST['ResponseCode']);
        $ReasonCode = intval($_POST['ReasonCode']);
        $ReasonDescr = $_POST['ReasonCodeDesc'];
        $Ref = $_POST['ReferenceNo'];
        $PaddedCardNo = $_POST['PaddedCardNo'];
        $Signature = $_POST['Signature'];
        //Authorization code is only returned in case of successful transaction, indicated with a value of 1
        //for both response code and reason code
        if ($ResponseCode == 1 && $ReasonCode == 1) {
            $AuthNo = $_POST['AuthCode'];
        }

        //The parameters used for creating the signature as stored on the merchant server
        $password = "mu2aO1jF";
        $merchantID = $MerID;
        $acquirerID = $AcqID;
        $orderID = $OrderID;
        //Form the plaintext string that used to product the hash it sent by concatenating Password, Merchant ID, Acquirer ID and Order ID
        //This will give: 1234abcd | 0011223344 | 402971 | TestOrder12345 (spaces and | introduced here for clarity)
        $toEncrypt = $password . $merchantID . $acquirerID . $orderID;
        //Produce the hash using SHA1
        //This will give fed389f2e634fa6b62bdfbfafd05be761176cee9
        $sha1Signature = sha1($toEncrypt);
        //Encode the signature using Base64
        //This will give /tOJ8uY0+mtivfv6/QW+dhF2zuk=
        $expectedBase64Sha1Signature = base64_encode(pack("H*", $sha1Signature));
        // signature verification is performed simply by comparing the signature we produced with the one sent
        $verifySignature = ($expectedBase64Sha1Signature == $Signature);


        return view('website.donate.bank-palestine.response', get_defined_vars());
    }



    public function responseBankPalestine(Request $request)
    {
        $MerID = $_POST['MerID'];
        $AcqID = $_POST['AcqID'];
        $OrderID = $_POST['OrderID'];
        // $ResponseCode = intval($_POST['ResponseCode']);
        // $ReasonCode = intval($_POST['ReasonCode']);
        // $ReasonDescr = $_POST['ReasonCodeDesc'];
        // $Ref = $_POST['ReferenceNo'];
        // $PaddedCardNo = $_POST['PaddedCardNo'];
        // $Signature = $_POST['Signature'];
        // $password = "mu2aO1jF";
        $merchantID = $MerID;
        $acquirerID = $AcqID;
        $orderID = $OrderID;


        $data = $request->all();
        $ResponseCode = intval($data['ResponseCode']);
        $ReasonCode = intval($data['ReasonCode']);
        $Signature = $data['Signature'];
        $password = "mu2aO1jF";
        $merchantID = $MerID;
        $acquirerID = $AcqID;
        $orderID = $data['OrderID'];
        $toEncrypt = $password . $merchantID . $acquirerID . $orderID;
        $sha1Signature = sha1($toEncrypt);
        $expectedBase64Sha1Signature = base64_encode(pack("H*", $sha1Signature));
        $verifySignature = ($expectedBase64Sha1Signature == $Signature);

        if ($verifySignature) {


            $donate = Payment::where('payment_id', $orderID)->first();

            if ($ResponseCode == 1 && $ReasonCode == 1) {
                if ($donate) {
                    $donate->update([
                        'status' => "paid",
                    ]);
                    $donate->save();
                    session()->flash('add');
                    return redirect()->route('supportUs');
                }
            }


            // $order = Order::where('payment_id', $orderID)->first();

            // if ($ResponseCode == 1 && $ReasonCode == 1) {
            //     if ($order) {
            //         $order->payment_status = 'paid';
            //         $order->payment_gateway_success_response = json_encode($data);
            //         $order->save();
            //         Notification::send($order->user, new OrderPaidNotification($order));
            //         return redirect()->route('front.profile.index', ['tab' => 'orders']);
            //     }
            // }

        }


        return redirect()->route('front.profile.index', ['tab' => 'orders'])->with('message', __($data['ReasonCodeDesc']));
    }
}





